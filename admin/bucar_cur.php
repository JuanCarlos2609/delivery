<?php
ini_set('display_errors','1');
//recordar l variable de sesion
session_start();
//validar que se cree una variable de sesion al pasar por login

if (isset($_SESSION['administradorssas'])) {
    
}else{
    header('Location:../Login.php');
}

include 'conexion.php';
date_default_timezone_set('America/Mexico_City'); 
$fecha = date('Y-m-d');


$query3 = "SELECT Nombre,ApP,ApM FROM Usuarios WHERE Usuario = '$_SESSION[loginssas]'" ;
$res = sqlsrv_query($conn,$query3);
$filee =  sqlsrv_fetch_array($res);
if($filee > 0){

    $user = $filee['Nombre'];
    $user1 = $filee['ApP'];
    $user2 = $filee['ApM'];
    
    $Nombre=$user.' '. $user1.' '. $user2;


    
    
}

$caja = null;
$mensaje = null;

                           if (isset($_POST['buscar'])) {

                                $caja = $_POST['caja'];
                                        
                        $buscar_caja = "SELECT NoCaja FROM Recepcion WHERE NoCaja = '$caja'";
                        $buscar_caja1 = sqlsrv_query($conn,$buscar_caja);
                        $buscar_caja2 = sqlsrv_fetch_array($buscar_caja1);


                        if ($buscar_caja2 > 0) {
                            $digitalizacion = "SELECT CodigoBarras as CB FROM Digitalizacion";
                        $digitalizacion1 = sqlsrv_query($conn,$digitalizacion);
                        
                        $recepcion = "SELECT CodigoBarras FROM Recepcion WHERE NoCaja LIKE '$caja'";
                        $recepcion1 = sqlsrv_query($conn,$recepcion);

                        $contador = "SELECT COUNT(CodigoBarras) AS contador FROM Recepcion WHERE NoCaja LIKE '$caja'";
                        $contador1 = sqlsrv_query($conn,$contador);
                        $contador2 = sqlsrv_fetch_array($contador1);

                        $contador3 = "SELECT COUNT(D.CodigoBarras) AS codbarras FROM Recepcion AS R INNER JOIN Digitalizacion AS D ON R.CodigoBarras = D.CodigoBarras WHERE R.NoCaja = '$caja'";
                            $contador4 = sqlsrv_query($conn,$contador3);
                            $contador5 = sqlsrv_fetch_array($contador4);

                           



                            
                    while ($recepcion2 = sqlsrv_fetch_array($recepcion1) ) {
                            $cb1 = $recepcion2['CodigoBarras']; 
                            $digitalizacion = "SELECT CodigoBarras as CB FROM Digitalizacion WHERE CodigoBarras = '$cb1'";
                            $digitalizacion1 = sqlsrv_query($conn,$digitalizacion);
                             $cantidad1 = $contador2['contador'];
                            $cantidad2 = $contador5['codbarras'];
                            
                            if ($cantidad1 == $cantidad2) {
                                $mensaje = "CAJA COMPLETADA";
                                echo $_SESSION['loginssas'];
                            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
                                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
                                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>';
 
                                echo "<script> swal({
                                title: '¡FELICIDADES!',
                                text: 'LA CAJA HA SIDO DIGITALIZADA COMPLETAMENTE, PUEDES CONTINUAR CON EL SIGUIENTE PROCESO.',
                                type: '',
                                });</script>";
                                
                            }else{
                                $mensaje = "CAJA NO COMPLETADA, VERIFIQUE LOS EXPEDIENTE FALTANTES POR DIGITALIZAR";
                                echo $_SESSION['loginssas'];
                            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
                                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
                                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>';
 
                                echo "<script> swal({
                                title: '¡ERROR!',
                                text: 'AUN CUENTA CON EXPEDIENTES POR DIGITALIZAR, DOCUMENTOS QUE NO TENGA DESCRIPCION DIGITALIZADO SON EXPEDIENTES FALTANTES POR DIGITALIZAR.',
                                type: '',
                                });</script>";
                            }
                            
                            
                            
                                 echo "$cb1\n";
                            while ($digitalizacion2 = sqlsrv_fetch_array($digitalizacion1)) {
                                $cb2 = $digitalizacion2['CB'];


                               

                                if ($cb1 == $cb2) {
                                echo "Digitalizado\n";
                                        }

                                    
                              
                            }

                            
                            

                                                    
                                
                               
                            
                            }
                        }else{
                            echo $_SESSION['loginssas'];
                            echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
                                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
                                echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>';
 
                                echo "<script> swal({
                                title: '¡ERROR!',
                                text: 'NO SE ENCONTRARON DATOS RELACIONADA CON LA CAJA.',
                                type: '',
                                });</script>";
                                $caja = null;
                        }
                        
                        
}







 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script language="javascript" type="text/javascript">
    window.history.forward();
</script>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
                                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
                                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>Administraci&oacute;n</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="../assets/img/logonuevo.jpg"/>
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
      


</head>
<body >
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="inicioadmin.php">
                        <img src="assets/img/spert.jpg" />

                    </a>
                    <a class="navbar-brand ">Sperto Digital</a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="cerrar_sesion.php" style="color:#fff;">CERRAR SESI&Oacute;N</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="inicioadmin.php" ><i class="fa fa-desktop "></i>Inicio <span class="badge"></span></a>
                    </li>
                   

                    <li>
                        <a href="consultas.php"><i class="fa fa-users "></i>Registros <span class="badge"></span></a>
                    </li>


                    <li>
                        <a href="reportes.php"><i class="fa fa-file-pdf-o "></i>Reportes<span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="../PreRecepcion.php"  target="popup" onClick="window.open(this.href, this.target, width=1280px,height=540); return false; window.close(); "><i class="fa fa-file-text-o"></i>Prerecepci&oacute;n<span class="badge"></span></a>
                    </li>

                    <li>
                        <a href="../Recepcion.php"  target="popup" onClick="window.open(this.href, this.target, width=540px,height=540); return false; window.close(); "><i class="fa fa-folder "></i>Recepci&oacute;n</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMINISTRADOR</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Bienvenido <?php echo $_SESSION['loginssas'];?>! </strong> 
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                    <div>
                
                          <form class="needs-validation" name="form_01"  method="POST">
                              <div class="form-row">
                                <div class="col-md-4 mb-3">
                                  <label for="validationTooltip01">Fecha</label>
                                  <input type="date" class="form-control" id="validationTooltip01" name="fecha" placeholder="Fecha" value="<?php echo $fecha ?>" readonly required>
                                  <div class="valid-tooltip">
                                    
                                  </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label for="validationTooltipUsername">Usuario</label>
                                  <div class="input-group">
                                  <input type="text" readonly value="<?php echo $_SESSION['loginssas']?>" class="form-control" id="validationTooltipUsername" name="user" placeholder="Usuario" aria-describedby="validationTooltipUsernamePrepend" required>
                                  </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label for="validationTooltip02">Nombre del usuario</label>
                                  <input type="text" name="Username" readonly value="<?php echo $Nombre ?>" class="form-control" id="validationTooltip02" placeholder="Last name"  required>
                                  <div class="valid-tooltip">
                                    
                                  </div>
                                </div>

                                
                              </div>
                              <div class="form-row">
                                
                                <div class="col-md-3 mb-3" >
                                  <label  >Nº CUR</label><br>
                                  <input  type="text" class="form-control" value="<?php echo $cur; ?>" maxlength="8" onkeyup="mayus(this);" name="cur" placeholder="Ingrese la CUR" >
                                  
                              <div><br>
                                <input  class="btn btn-primary" name="buscar"   onclick="return validacion();" type="submit" value="Buscar">
                                  
                                
                              </div>
                                </div>
                                <div class="form-row">
                              </div>
                              </div>
                              
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-3" style="width:60%">
                                  <label for="validationTooltip03">Mensaje</label><br>
                                  <input type="text" class="form-control" name="mensaje"  value="<?php echo $mensaje ?>" id="validationTooltip03" placeholder="Mensaje" readonly>
                                  
                                
                              </div>
                               
                            </div>
                            <div class="form-row" id="datos">
                            </div>  
                 <!-- /. ROW  --> 
          
                  <!-- /. ROW  -->    
                 <div class="row text-center pad-top" id="datos_buscador">
                   
                 
                  

              </div>
                 <!-- /. ROW  -->  
                 
                  <!-- /. ROW  -->  
                
                 <!-- /. ROW  -->   
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2022 | Diseñado por: <a>Sperto  Digital</a>
                </div>
            </div>
        </div>
          
<script type="text/javascript">
    function mayus(e){
                        e.value = e.value.toUpperCase();
                }



                  function validacion(){



            if (document.form_01.caja.value.length==0){
            alert("Tiene que escribir la caja")
            document.form_01.caja.focus()
            return false;
            }

           

            
            
            document.form_01.submit();
            
        }
 
</script>

<script type="text/javascript">
    $("input[name='codigobarra']").keydown(function(e) {
    if(e.which <= 10) {
        $.post('buscarcaja.php', {
            ID : $("input[name='codigobarra']").val()
        }, function(data){
            $('#datos_buscador').html(data);
        });
    }
});
</script>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
  
   
</body>
</html>
