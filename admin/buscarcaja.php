<script>
    $("input[name='caja']").val('');
    $("input[name='mensaje']").val('');
    $("input[name='ubicar']").attr('disabled','disabled');
</script>

<?php


include 'conexion.php';
  $Iden = $_POST['ID']?$_POST['ID']:NULL;
	$query = "SELECT Nocaja FROM Recepcion WHERE CodigoBarras LIKE LOWER('%".$Iden."%')  ";

	$busca = sqlsrv_query($conn, $query);
	$buscador = sqlsrv_fetch_array($busca,SQLSRV_FETCH_ASSOC)

?>


<?php if($buscador > 0){ ?>
			
	<?php $caja = $buscador['Nocaja']; ?>
	<script type="text/javascript">
	$("input[name='caja']").val("<?php echo $caja; ?>");
	$("input[name='ubicar']").removeAttr('disabled');
</script>

<?php }else{ 
	$mensaje = "NO HAY CAJA RELACIONADA CON ESTE CODIGO DE BARRA";
?>
<script type="text/javascript">
	$("input[name='mensaje']").val("<?php echo $mensaje; ?>");

</script>

<?php	
}



?>
