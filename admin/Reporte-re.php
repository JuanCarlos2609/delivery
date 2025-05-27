<?php
ob_start();

?>
<html>
<head>
	<title>Reporte de Recepci&oacute;n</title>
		<meta charset="UTF-8">
</head>
<body>

	<?php
	include 'conexion.php';

	$contador = "SELECT COUNT(CodigoBarras) as total_expedientes,U.Nombre,U.ApM,U.ApP,P.UsuarioEntrega,R.Fecha FROM Recepcion AS R INNER JOIN Usuarios AS U ON R.Usuario=U.Usuario INNER JOIN PreRecepcion AS P ON R.NoRecepcion = P.NoRecepcion WHERE R.NoRecepcion = '$_GET[Norecepcion]' GROUP BY R.Usuario,U.Nombre,U.ApP,U.ApM,P.UsuarioEntrega,R.Fecha";
	$contador1 = sqlsrv_query($conn,$contador);
	$contador2 = sqlsrv_fetch_array($contador1);

	if ($contador2 > 0) {
		$total = $contador2['total_expedientes'];
		$nombre = $contador2['Nombre'];
		$app = $contador2['ApM'];
		$apm = $contador2['ApM'];
		$entrega = $contador2['UsuarioEntrega'];
		$fecha = $contador2['Fecha']->format('Y-m-d');;
		$Nombre=$nombre.' '. $app.' '. $apm;

		
		

		
	}




	?>
	<h5 align="center">FORMATO DE RECEPCI&Oacute;N DE EXPEDIENTES</h3>
	<h6 align="center">Digitalizaci&oacute;n de documentos</h4>
	<table align="center" border="2" bordercolor="#00FF00 ">
		<tr style=" font-size: 8;">
			<td>Total de expedientes:</td>
			<td WIDTH="150"><?php echo ($total); ?></td>
			<td>Nº Recepcion:</td>
			<td WIDTH="150"><?php echo ($_GET['Norecepcion']); ?></td>
		</tr>
	</table>
	<table  border="1" bordercolor="#00FF00 " style="float: left;">
		<tr style=" font-size: 8;">
			<td>Numero</td>
			<td >Codigo de barras</td>
			<td >Nº de Caja</td>		
					
			
			

		</tr>

		<?php 

	include 'conexion.php';



$query3 = "SELECT CodigoBarras,R.Observaciones, NoCaja,Fecha,UsuarioEntrega, Nombre, ApP,ApM FROM Recepcion as R INNER JOIN PreRecepcion as P ON  R.NoRecepcion = P.NoRecepcion INNER JOIN Usuarios as U ON R.Usuario = U.Usuario WHERE R.NoRecepcion = '$_GET[Norecepcion]'";
$res = sqlsrv_query($conn,$query3);
$codigo = 0;

	
	

	for ($i=0; $i < 26 ; $i++) { 
		$codig =  $codigo+=1;
		$filee =  sqlsrv_fetch_array($res);
	$cb=$filee['CodigoBarras'];
	$user = $filee['Nombre'];
	$user1 = $filee['ApP'];
	$user2 = $filee['ApM'];
	
	$observaciones = $filee['Observaciones'];
	$caja = $filee['NoCaja'];
	

		?>
	
		<tr style=" font-size: 8;">
			<td><?php echo ($codig); ?></td>
			<td><?php echo ($cb); ?></td>
			<td><?php echo ($caja); ?></td>


			
<?php
}	
?>		
	</tr>		
			
		
	
	</table> <!-- AQUI TERMINA PRIMERA TABLA-->
	<table  border="1" bordercolor="#00FF00 " style="float:left;">
		<tr style=" font-size: 8;">
			<td>Numero</td>
			<td >Codigo de barras</td>
			<td >Nº de Caja</td>		
					
			
			

		</tr>

		<?php 

	

	
	

	for ($i=0; $i < 26 ; $i++) { 
		$codig =  $codigo+=1;
		$filee =  sqlsrv_fetch_array($res);
	$cb=$filee['CodigoBarras'];
	$caja = $filee['NoCaja'];
	

		?>
	
		<tr style=" font-size: 8;">
			<td><?php echo ($codig); ?></td>
			<td><?php echo ($cb); ?></td>
			<td><?php echo ($caja); ?></td>
			
<?php
}					
?>
			
	</tr>		
			
		
	
	</table>
	<table  border="1" bordercolor="#00FF00 " style="float:left;">
		<tr style=" font-size: 8;">
			<td>Numero</td>
			<td >Codigo de barras</td>
			<td >Nº de Caja</td>		
					
			
			

		</tr>

		<?php 

	

	
	

	for ($i=0; $i < 26 ; $i++) { 
		$codig =  $codigo+=1;
		$filee =  sqlsrv_fetch_array($res);
	$cb=$filee['CodigoBarras'];
	$caja = $filee['NoCaja'];
	

		?>
	
		<tr style=" font-size: 8;">
			<td><?php echo ($codig); ?></td>
			<td><?php echo ($cb); ?></td>
			<td><?php echo ($caja); ?></td>
			
<?php
}					
?>
			
	</tr>		
			
		
	
	</table>
	<table  border="1" bordercolor="#00FF00 " style="float:left;">
		<tr style=" font-size: 8;">
			<td>Numero</td>
			<td >Codigo de barras</td>
			<td >Nº de Caja</td>		
					
			
			

		</tr>

		<?php 

	

	
	

	for ($i=0; $i < 26 ; $i++) { 
		$codig =  $codigo+=1;
		$filee =  sqlsrv_fetch_array($res);
	$cb=$filee['CodigoBarras'];
	$caja = $filee['NoCaja'];
	

		?>
	
		<tr style=" font-size: 8;">
			<td><?php echo ($codig); ?></td>
			<td><?php echo ($cb); ?></td>
			<td><?php echo ($caja); ?></td>
			
<?php
}					
?>
			
	</tr>		
			
		
	
	</table>
	<table  border="1" bordercolor="#00FF00 " style="float:left;">
		<tr style=" font-size: 8;">
			<td>Numero</td>
			<td >Codigo de barras</td>
			<td >Nº de Caja</td>		
					
			
			

		</tr>

		<?php 

	

	
	

	for ($i=0; $i < 26 ; $i++) { 
		$codig =  $codigo+=1;
		$filee =  sqlsrv_fetch_array($res);
	$cb=$filee['CodigoBarras'];
	$caja = $filee['NoCaja'];
	
	
	
	
	

		?>
	
		<tr style=" font-size: 8;">
			<td><?php echo ($codig); ?></td>
			<td><?php echo ($cb); ?></td>
			<td><?php echo ($caja); ?></td>
			
<?php
}					
?>
			
	</tr>		
			
		
	
	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	<br>
	<table align="center"  border="3" bordercolor="#00FF00 " style="font-size: 8;">
		<tr >
			<td>RECIBE</td>
			<td>ENTREGA</td>
			<td>FECHA DE RECEPCI&Oacute;N</td>
			
		</tr>
		<tr >
			<td align="center"><?php echo ($Nombre); ?></td>
			<td align="center"><?php echo ($entrega); ?></td>
			<td align="center"><?php echo ($fecha); ?></td>
			
		</tr>
		<tr >
			<td align="center">SUPERVISOR DE PROCESOS</td>
			<td align="center"></td>
			<td align="center"></td>
			
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

$Dompdf->set_paper('letter','landscape');

$Dompdf->render();

$Dompdf->stream("reporte-recepcion.pdf", array("Attachment"=>false));


?>
