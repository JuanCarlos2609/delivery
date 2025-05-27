<?php
 ini_set( 'display_errors', 1 );
error_reporting( E_ALL );


include("conexion.php");

$user = $_POST['usuario'];
$name = $_POST['nombre'];
$app = $_POST['app'];
$apm = $_POST['apm'];
$contra = $_POST['contra'];
$perfil = addslashes(implode( $_POST['perfil']));
$sed = $_POST['sed'];

$consulta_usuario = "SELECT Usuario From Usuarios WHERE Usuario = '$user'";

$con_usuario = sqlsrv_query($conn,$consulta_usuario);

$recorre_usuario = sqlsrv_fetch_array($con_usuario);


if ($recorre_usuario > 0) {
    echo'<script type="text/javascript">
                    alert("No se puede agregar, el usuario '.$user.' ya se encuentra registrado.");
                    window.location.href="registro.php";
                    </script>';
    
}else{
    $query = "INSERT INTO Usuarios(Usuario,Nombre,ApP,ApM,Password,Perfil,Sede) VALUES ('$user','$name','$app','$apm','$contra','$perfil','$sed')";

$res = sqlsrv_prepare($conn, $query);

        if(sqlsrv_execute( $res)){


                   echo'<script type="text/javascript">
                    alert("Agregado Correctamente");
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
}





sqlsrv_close($conn);
?>