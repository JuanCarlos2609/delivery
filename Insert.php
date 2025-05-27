<?php
include("conexion.php");

$user = $_POST['usuario'];
$name = $_POST['nombre'];
$app = $_POST['app'];
$apm = $_POST['apm'];
$contra = $_POST['contra'];
$contra1 = $_POST['contra1'];
$perf = $_POST['perf'];
$sed = $_POST['sed'];


$sel = "SELECT * FROM Usuarios WHERE Usuario = $user";
$rw = sqlsrv_query($conn,$sel);


if($rw > 0){
    
    echo'<script type="text/javascript">
                    alert("Usuario No disponible, se encuetra agregado");
                    window.location.href="Alta_Usuario.php";
          </script>';          
}elseif ($_POST['contra'] != $_POST['contra1']) {
   echo'<script type="text/javascript">
                    alert("Las contraseñas no coinciden")
                    window.location.href="Alta_Usuario.php";;
          </script>';
} else {

$query = "INSERT INTO Usuarios(Usuario,Nombre,ApP,ApM,Password,Perfil,Sede) VALUES ('$user','$name','$app','$apm','$contra','$perf','$sed')";

$res = sqlsrv_prepare($conn, $query);

        if(sqlsrv_execute( $res)){
	               echo'<script type="text/javascript">
                    alert("Agregado Correctamente");
                    window.location.href="Alta_Usuario.php"
                    function Limpiar() {
						var t = document.getElementById("f").getElementsByTagName("input");
							for (var i=0; i<t.length; i++) {
    										t[i].value = "";
    						}
							}
                    </script>';
        }else{
	                echo'<script type="text/javascript">
                    alert("No se pudo agregar, Intentelo mas tarde");
                    window.location.href="Alta_Usuario.php";
                  </script>';

                }
}

sqlsrv_close($conn);
?>