<?php

include 'conexion.php';
$admin = null;
$administrador = null;
$Captura = null;
$operador = null;
$recep = null;
$recepcion = null;
$devol = null;
$devolucion = null;
$audi = null;
$auditoria = null;
$cal = null;
$calidad = null;
$veri = null;
$SinAtributos = null;
$check = null;
$checklist = null;
$separar_letras = null;
$actualizar_usuario = "SELECT * FROM Usuarios where Usuario = '$_GET[Usuario]'";

$actualizar = sqlsrv_query($conn,$actualizar_usuario);

$resp_actualizar = sqlsrv_fetch_array($actualizar);

if ($resp_actualizar > 0) {
	$usuario = $resp_actualizar['Usuario'];
	$nombre = $resp_actualizar['Nombre'];
	$app = $resp_actualizar['ApP'];
	$apm = $resp_actualizar['ApM'];
	$pass = $resp_actualizar['Password'];
	$perfil = $resp_actualizar['Perfil'];
	$sede = $resp_actualizar['Sede'];
	
	$separar_letras = str_split($perfil);

	$array = array($separar_letras);


	if (in_array("A", $separar_letras)) {
		$admin = "A";
		$administrador = 'checked';
	}
	if (in_array("D", $separar_letras)){
		$digi = "D";
		$digital = 'checked';
		$visual = 'block';
		$operador = 'checked';
	}
	if(in_array("S", $separar_letras)){
		$SinAtributos = 'checked';
		$visual = 'block';
        $operador = 'checked';
	}
	if(in_array("C", $separar_letras)){
		$Captura = 'checked';
		$visual = 'block';
        $operador = 'checked';
	}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizaci&oacute;n</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="../assets/img/logonuevo.jpg"/>
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
</head>
<body>
    <script>
        function mayus(e){
            e.value = e.value.toUpperCase();
        }

    


      </script>

           
          
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
                  <a href="registro.php" style="color:#fff;">REGRESAR</a>  

                </span>
            </div>
        </div>
       

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12"></br>
                        <h2>ACTUALIZACI&Oacute;N DE USUARIOS</h2>
                    </div>
                </div>
            <div >
            
                <form action="update_usuario.php?Usua=<?php echo $_GET['Usuario']?>" method="POST" name="form_01" class="login100-form validate-form p-b-33 p-t-5">
                    
                        <div class="col-lg-6 col-md-6 ">

                            <label>Usuario</label>
                             <div class="wrap-input100 validate-input" data-validate = "Ingrese usuario" id="numInvEq">
                             <input type="text" class="input100" id="User" value="<?php echo $usuario; ?>"  readonly name="usuario" placeholder="Ingrese Usuario" onkeyup="mayus(this)" required />
                             </div>

                            <label>Nombre</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese nombre" id="numInvEq1">
                            <input type="text" class="input100" id="name" value="<?php echo $nombre; ?>"  name="nombre" placeholder="Ingrese Nombre" onkeyup="mayus(this)" required />
                            </div>

                            <label>Apellido Paterno</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese Apellido">
                            <input type="text" class="input100" value="<?php echo $app; ?>"  name="app" placeholder="Ingrese su Apellido" onkeyup="mayus(this)" required />
                            </div>

                            <label>Apellido Materno</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese Apellido">
                            <input type="text" class="input100" value="<?php echo $apm; ?>"  name="apm" placeholder="Ingrese su Apellido" onkeyup="mayus(this)"/>
                            </div>

                            <label>Contraseña</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese contraseña">
                            <input type="password" class="input100" value="<?php echo $pass; ?>"  name="contra" placeholder="Ingrese su contraseña" onkeyup="mayus(this)" required >
                            </div>
                            <label>PERFIL</label>
                            
                                <div class="form-control">
                                Administrador:&nbsp;<input type="checkbox"  id="admin" <?php echo $administrador; ?> name="perfil[]" value="<?php echo $admin; ?>" onchange="javascript:administradores();">
                                </div>
                                <div class="form-control">
                                Operador: &nbsp;<input type="checkbox" id="operador" <?php echo $operador; ?> name="" onchange="javascript:operadores();">   
                                </div>
                                <div class="form-control">
                                Ejecutivo:&nbsp;      <input type="checkbox"  id="check1" name="" onchange="javascript:showContent1();" >
                                </div>
                                <div id="content1" style="display: none;"> 
                                    <input type="checkbox"  name="perfil[]" value="Ejecutivo">&nbsp;&nbsp;Nivel Ejecutivo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <input type="checkbox"  name="perfil[]" value="Administrativo">&nbsp;&nbsp;Nivel Administrativo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="div_a_mostrar" id="content" style="display: none;display: <?php echo $visual; ?>;">
                                   <div> 
                                   <input type="checkbox" id="val1" <?php echo $Captura; ?> name="perfil[]" value="C" onchange="javascript:VaidaOpcion1();">&nbsp;&nbsp;Captura&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="checkbox" id="val2" <?php echo $SinAtributos; ?> name="perfil[]" value="S" onchange="javascript:VaidaOpcion2();">&nbsp;&nbsp;Sin Atributos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>                                            
                            </br>
                            <label>SEDE</label>
                            <div  data-validate = "Ingrese Sede">
                            <select id="sede" name="sed" class="input100">
                    <option value=null>Seleccione:</option>
                    <?php
            include 'conexion.php';
            $alta = "SELECT Sede FROM Sede";
            $fila = sqlsrv_query($conn,$alta);
           while( $valor =  sqlsrv_fetch_array($fila)){

           	if ($sede  == $valor['Sede']) {
           	?>
           		<option value="<?php echo $sede; ?>" selected><?php echo $valor['Sede']; ?></option>;
           	<?php	
           	}else{
           	?>	
           		<option value="<?php echo $valor['Sede']; ?>"><?php echo $valor['Sede']; ?></option>;
           	<?php
           	}
            
          }
            ?> 
                </select>
                            </div>
                        </br>
                            <div class="container-login100-form-btn m-t-32">
                            <button onclick="return validaperfiles();" name="actualizar" type="submit" class="login100-form-btn">ACTUALIZAR</button>
                            </div>
                        </div>    
                         
                </form>
                </div>
               
               
            </div>   
        </div>
    </div>      


<script type="text/javascript">
    function ValidaOpcion1(){
        valor1 = document.getElementById("val1");
        if(valor1.checked){
            document.form_01.val2.checked = false;            
        }
    }

    function ValidaOpcion2(){
        valor2 = document.getElementById("val2");
            if(valor2.checked){
                document.getElementById("val1").checked = false;
            }                
    }

function operadores(){
    operadors = document.getElementById("operador");
      valor1 = document.getElementById("val1");
    valor2 = document.getElementById("val2");
if (operadors.checked) {
        document.getElementById("content").style.display = 'block';
        document.getElementById("admin").checked = false;
        document.getElementById("content1").style.display = 'none';
         if(valor1.checked || valor2.checked ){
            
         }else{
            return false;
         }

    }
}


 function validaperfiles() {
    
    operadors = document.getElementById("operador");
    admin = document.getElementById("admin");
    valor1 = document.getElementById("val1");
    valor2 = document.getElementById("val2");
        
    if (document.form_01.sede.selectedIndex==0) {
        alert("Debe seleccionar una sede.")
          document.form_01.sede.focus()
          return false;
    }

    if (operadors.checked) {
        document.getElementById("content").style.display = 'block';
        document.getElementById("admin").checked = false;
        document.getElementById("content1").style.display = 'none';
         if(valor1.checked || valor2.checked){
            return true;
         }else{
            alert("selecciona un perfil de operador");
            return false;
         }

    }else if (admin.checked){
        document.getElementById("operador").checked = false;
        document.getElementById("content").style.display = 'none';
        document.getElementById("val1").checked = false;
        document.getElementById("val2").checked = false;
    }else{
        document.getElementById("content").style.display = 'none';
        alert("selecciona un perfil para el usuario");
            return false;
    }

    
}


function administradores(){
    admin = document.getElementById("admin");

    

    if (admin.checked) {
        document.getElementById("operador").checked = false;
        document.getElementById("content").style.display = 'none';
        document.getElementById("val1").checked = false;
        document.getElementById("val2").checked = false;
    }else{

    }
}

</script>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->

    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

      <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/bootstrap/js/popper.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/daterangepicker/moment.min.js"></script>
  <script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="../vendor/countdowntime/countdowntime.js"></script>
<script src="../js/main.js"></script>
    
   
</body>
</html>
