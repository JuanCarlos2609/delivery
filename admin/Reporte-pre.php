<?php
ob_start();

?>
<html>
<head>
	<title>Reporte de Pre-Recepci&oacute;n</title>
		<meta charset="UTF-8">
</head>
<body>

	<?php

	include 'conexion.php';



$query3 = "SELECT NoRecepcion,Nombre,ApP,ApM, FechapreRecepcion,Hora_Inicial,Hora_Final,AniosDocumentos, UsuarioEntrega, CantidadDocumentos,PreRecepcion.Sede,Observaciones, Cajas FROM PreRecepcion INNER JOIN Usuarios ON PreRecepcion.Usuario=Usuarios.Usuario WHERE NoRecepcion = '$_GET[Norecepcion]' ";
$res = sqlsrv_query($conn,$query3);
$filee =  sqlsrv_fetch_array($res);
if($filee > 0){
	$No=$filee['NoRecepcion'];
	$user = $filee['Nombre'];
	$user1 = $filee['ApP'];
	$user2 = $filee['ApM'];
	$fech = $filee['FechapreRecepcion'];
	$inicio = $filee['Hora_Inicial'];
	$final = $filee['Hora_Final'];
	$Anios = $filee['AniosDocumentos'];
	$UsuaEntrega = $filee['UsuarioEntrega'];
	$cando = $filee['CantidadDocumentos'];
	$sede  = $filee['Sede'];
	$observaciones = $filee['Observaciones'];
	$caja = $filee['Cajas'];
	$Nombre=$user.' '. $user1.' '. $user2;	


}else{
	
}
sqlsrv_close($conn);
	?>
	<h3 align="center">FORMATO DE PRE-RECEPCI&Oacute;N DE EXPEDIENTES</h3>
	<h4 align="center">Servicios para la verificaci&oacute;n y digitalizaci&oacute;n de archivos f&iacute;sicos</h4>
	<table align="center" border="2" bordercolor="#00FF00 ">
		<tr>
			<td>LUGAR:</td>
			<td WIDTH="150"><?php echo ($sede) ?></td>
			<td>FECHA:</td>
			<td WIDTH="150"><?php echo ($fech); ?></td>
		</tr>
		<tr>
			<td >INICIO (HORA):</td>
			<td ><?php echo ($inicio) ?></td>
			<td>T&Eacute;RMINO (HORA):</td>
			<td><?php echo ($final) ?></td>
		</tr>
	</table><br>
	<h4 align="center">Por medio de la presente se manifiesta que se realiz&oacute; la entrega/recepci&oacute;n de expedientes descrita en la tabla a continuaci&oacute;n:</h4>
	<table align="center" border="2" bordercolor="#00FF00 ">
		<tr>
			<td>N&uacute;mero de Pre-Recepci&oacute;n:</td>
			<td WIDTH="200"><?php echo ($No); ?> </td>
		</tr>
		<tr>
			<td>Expedientes Entregados:</td>
			<td><?php echo ($cando); ?> </td>
		</tr>
		<tr>
			<td>Cajas:</td>
			<td><?php echo ($caja) ?></td>
		</tr>
		<tr>
			<td>A&ntilde;os:</td>
			<td><?php echo ($Anios) ?></td>
		</tr>
		<tr>
			<td>Notas:</td>
			<td><?php echo ($observaciones) ?></td>
		</tr>
	</table><br>
	<h4 align="center">Una vez ingresados en el Sistema de Control de Sperto Digital se entregar&aacute; el listado definitivo de Expedientes recibidos asociados uno a uno al c&oacute;digo de barras correspondiente.</h4>
	<table align="center" border="2" bordercolor="#00FF00 ">
		<tr>
			<td>Recepci&oacute;n final por sistema:</td>
			<td WIDTH="150"><?php echo ($cando) ?></td>
		</tr>
	</table>
	<br><br><br><br>
	<table align="center" border="3" bordercolor="#00FF00 ">
		<tr>
			<td WIDTH="300" 
	    HEIGHT="100"></td>
			<td WIDTH="300" 
	    HEIGHT="100"></td>
		</tr>
		<tr>
			<td align="center">Entrega del cliente<br /> 
			Nombre: <?php echo ($UsuaEntrega); ?></td>
			<td align="center">Recibe Sperto Digital<br />
			Nombre: <?php echo ($Nombre); ?></td>
		</tr>
	</table>

</body>
</html>

<?php
$html = ob_get_clean();

require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$Dompdf =  new Dompdf();

$options = $Dompdf->getOptions();
$options->set(array("isRemoteEnabled" => true));

$Dompdf->setOptions($options);

$Dompdf->loadHtml($html);

$Dompdf->set_paper('letter','portrait');

$Dompdf->render();

$Dompdf->stream("reporte-prerecepcion.pdf", array("Attachment"=>false));


?>
