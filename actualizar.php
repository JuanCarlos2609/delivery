<?php
 ini_set('display_errors','1');
 session_start();
 if ( isset($_SESSION['capturaudeg'])) {
     
   }else{
       header('Location: Login.php');
   }
 
include 'conexion.php';
$pass1 = $_POST['pass1']; 
$pass2 = $_POST['pass2'];

$usuario = "SELECT Password FROM Usuarios WHERE Usuario = '$_GET[Usuario]'";
$conusuario = sqlsrv_query($conn,$usuario);
$recorre_user = sqlsrv_fetch_array($conusuario);
$sql = "UPDATE Usuarios SET Password = '$pass1' WHERE Usuario = '$_GET[Usuario]' ";   
  $pass = $recorre_user['Password'];
if ($pass == $pass1) {
       echo'<script type="text/javascript">
             alert("No puedes ingresar la misma contraseña que tienes en registro para acceder al sistema");
             window.location.href="actualizar_password.php";
             </script>';
}elseif($pass1 == "NUEVO" || $pass2 == "NUEVO"){
    echo'<script type="text/javascript">
             alert("No se puede ingresar NUEVO como contraseña");
             window.location.href="actualizar_password.php";
             </script>';
}elseif ($pass1 == $pass2 && $pass1 != "NUEVO" && isset($pass1)) {
    if(sqlsrv_query($conn,$sql)){
        session_destroy();
        echo'<script type="text/javascript">
             alert("Contraseña Actualizada");
             window.close();
             </script>';
    }else{
        echo'<script type="text/javascript">
             alert("Hubo problemas de conexion, Notifique a su administrador...");
             window.location.href="actualizar_password.php";
             </script>';
    }
}else{
    echo'<script type="text/javascript">
             alert("Las contraseñas no son iguales y/o no no ha ingresado una nueva contraseña y/o no se puede poner NUEVO como contraseña");
             window.location.href="actualizar_password.php";
             </script>';
}

?>