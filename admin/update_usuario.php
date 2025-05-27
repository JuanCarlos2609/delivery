<?php
 
include("conexion.php");

$user = $_POST['usuario'];
$name = $_POST['nombre'];
$app = $_POST['app'];
$apm = $_POST['apm'];
$contra = $_POST['contra'];
$perfil = addslashes(implode( $_POST['perfil']));
$sed = $_POST['sed'];



$query = "UPDATE Usuarios SET Usuario = '$user' , Nombre = '$name' ,ApP = '$app' ,ApM = '$apm' ,Password = '$contra' ,Perfil = '$perfil' ,Sede = '$sed' WHERE Usuario = '$_GET[Usua]'";

$res = sqlsrv_prepare($conn, $query);

        if(sqlsrv_execute( $res)){
        
	               echo'<script type="text/javascript">
                    alert("El usuario ha sido Actualizado");
                   window.location.href="registro.php"
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
                    window.location.href="registro.php";
                  </script>';

                }


sqlsrv_close($conn);
?>