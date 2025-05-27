<?php
$serverName = "JCHARLIE1508\SQLEXPRESS"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"DBUDEG","CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     
}else{
     echo "La Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>
