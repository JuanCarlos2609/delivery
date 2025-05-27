<?php
include 'conexion.php';
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
	print_r($array);
	
	echo $sede;
}
?>