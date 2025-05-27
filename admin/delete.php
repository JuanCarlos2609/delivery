<?php
    include 'conexion.php';
	$consulta_usuario ="Select U.Usuario from Usuarios AS U INNER JOIN Checklist AS CH ON U.Usuario = CH.Usuario_verificacion WHERE U.Usuario = '$_GET[Usuario]' UNION SELECT U.Usuario FROM Usuarios AS U INNER JOIN Verificacion AS V ON U.Usuario = V.Usuario_Calidad WHERE U.Usuario = '$_GET[Usuario]' UNION SELECT U.Usuario FROM Usuarios AS U INNER JOIN CALIDAD AS CA ON U.Usuario =  CA.usuario WHERE U.Usuario = '$_GET[Usuario]'";
    $con_usuario = sqlsrv_query($conn,$consulta_usuario);
    $recorrer_usuario = sqlsrv_fetch_array($con_usuario);
    $usuario = $_GET['Usuario'];
    echo $usuario;
    if($recorrer_usuario >= 0) {
        $user = $recorrer_usuario['Usuario'];
        if ($user == $usuario) {                                
            echo'<script type="text/javascript">
                alert("El usuario  '.$usuario.'  no puede ser eliminado, se encuentra realizando acciones en el sistema o tiene informacion relacionada con el usuario.");
                window.location.href="registro.php";
                </script>';
        }else{
            $sql3 = "DELETE FROM Usuarios WHERE Usuario = '$usuario'";
            $res3 = sqlsrv_query($conn,$sql3);
            if($res3 > 0){
                echo'<script type="text/javascript">
                alert("El usuario  '.$usuario.'  fue eliminado, no se encontro acciones o informacion relacionada con el usuario.");
                window.location.href="registro.php";
                </script>';
            }                 
        }
    }
?>