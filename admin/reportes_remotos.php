<?php
ini_set('display_errors','1');
//recordar l variable de sesion
session_start();
//validar que se cree una variable de sesion al pasar por login

if (isset($_SESSION['administradorssas'])) {
    
}else{
    header('Location:../Login.php');
}

 ?>

<!DOCTYPE html>
<!-- saved from url=(0057)https://colorlib.com/etc/tb/Table_Fixed_Header/index.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Remotos</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
 


<link rel="stylesheet" type="text/css" href="./Table V04_files/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="./Table V04_files/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="./Table V04_files/animate.css">

<link rel="stylesheet" type="text/css" href="./Table V04_files/select2.min.css">

<link rel="stylesheet" type="text/css" href="./Table V04_files/perfect-scrollbar.css">
<link href="assets/img/logonuevo.jpg" rel="icon">
<link rel="stylesheet" type="text/css" href="./Table V04_files/util.css">
<link rel="stylesheet" type="text/css" href="./Table V04_files/main.css">

<meta name="robots" content="noindex, follow">
<script type="text/javascript" async="" src="./Table V04_files/analytics.js.descargar" nonce="c35271fa-ad83-4bac-bcd1-2468df267ab3"></script><script defer="" referrerpolicy="origin" src="./Table V04_files/s.js.descargar"></script><script nonce="c35271fa-ad83-4bac-bcd1-2468df267ab3">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.addEventListener("DOMContentLoaded",(()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0,z.referrerPolicy="origin",z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)}))}(w,d,0,"script");})(window,document);</script></head>
<body>





<div class="limiter">

<div class="form-group" style="float:right;"><br>
                <button class="btn btn-primary "onclick="window.location.href='reportes.php'"  name="salir">Salir</button>  
</div> 

<div class="container-table100">

<form class="needs-validation" name="form_01"  method="POST">
            <div class="form-row" style="float: left;">
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip01">Fecha inicio</label>
                  <input type="date" class="form-control" id="fec_ini" name="fecha_inicio" placeholder="Fecha" required>
               
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationTooltip01">Fecha final</label>
                  <input type="date" class="form-control" id="fec_fin" name="fecha_final" placeholder="Fecha" required>
               
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltipUsername">Busqueda R&aacute;pida</label>
                <div class="input-group">
                    <input type="text"  class="form-control" id="buscar" name="buscador" placeholder="Buscador" aria-describedby="validationTooltipUsernamePrepend" >
                </div>
                 
                </div>

            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <div class="form-row" style="float:right;">
                <input  class="btn btn-primary" name="ubicar"   onclick="return validacion();" type="submit"value="Imprimir reporte">
            </div>               
                              
</form>

<div class="wrap-table100">
<div class="table100 ver1 m-b-110">
<div class="table100-head">
<table>
<thead>
<tr class="row100 head">
<th class="cell100 column1">Usuario</th>
<th class="cell100 column2">Total Checklist</th>
<th class="cell100 column3">Total Verificaci&oacute;n</th>
<th class="cell100 column4">Total Calidad</th>
<th class="cell100 column5">Total Auditoria</th>
<th class="cell100 column6">Acci&oacute;n</th>
</tr>
</thead>
</table>
</div>
<div class="table100-body js-pscroll ps ps--active-y">
<table>
<tbody>
    <?php 
    include 'conexion.php';

    $select_user = "SELECT U.Usuario,COUNT(D.CodigoBarras) AS Cantidad_checklist FROM Usuarios AS U INNER JOIN Digitalizacion AS D ON U.Usuario = D.Usuario_checklist GROUP BY U.Usuario";
    $user = sqlsrv_query($conn,$select_user);

    $select_user1 = "SELECT U.Usuario, COUNT(C.codigobarra) AS Cantidad_verificacion FROM Usuarios AS U INNER JOIN Checklist AS C ON U.Usuario = C.Usuario_verificacion GROUP BY U.Usuario";
    $user1 = sqlsrv_query($conn,$select_user1);



    while (($fila = sqlsrv_fetch_array($user)) && ($recorre1 = sqlsrv_fetch_array($user1))) {
        
    ?>
<tr class="row100 body">
<td class="cell100 column1"><?php echo $fila['Usuario']; ?></td>

<td class="cell100 column2"><?php echo $fila['Cantidad_checklist']; ?></td>
<td class="cell100 column3"><?php echo $recorre1['Cantidad_verificacion']; ?></td>
<td class="cell100 column4"></td>
<td class="cell100 column5"></td>
<td class="cell100 column6"><input style="width:90%" class="btn btn-primary" name="report"  type="submit"value="Reporte"></td>
<?php  } ?>
</tr>

</tbody>
</table>
<div class="ps__rail-x" style="left: 0px; bottom: -580.8px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 580.8px; height: 585px; right: 5px;"><div class="ps__thumb-y" tabindex="0" style="top: 291px; height: 293px;"></div></div></div>
</div>


</div>
</div>
</div>

<script src="./Table V04_files/jquery-3.2.1.min.js.descargar"></script>

<script src="./Table V04_files/popper.js.descargar"></script>
<script src="./Table V04_files/bootstrap.min.js.descargar"></script>

<script src="./Table V04_files/select2.min.js.descargar"></script>

<script src="./Table V04_files/perfect-scrollbar.min.js.descargar"></script>
<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})
		});


	</script>

<script async="" src="./Table V04_files/js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<script src="./Table V04_files/main.js.descargar"></script>
<script defer="" src="./Table V04_files/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon="{&quot;rayId&quot;:&quot;706d57ad08d5d0a4&quot;,&quot;token&quot;:&quot;cd0b4b3a733644fc843ef0b185f98241&quot;,&quot;version&quot;:&quot;2021.12.0&quot;,&quot;si&quot;:100}" crossorigin="anonymous"></script>


</body></html>