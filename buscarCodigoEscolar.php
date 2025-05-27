<script>
    $("input[name='NombreCompleto']").val('');
    $("input[name='Carrera']").val('');
    $("input[name='FechaGraduacion']").val('');
    $("input[name='CentroUniversitario']").val('');
</script>
<?php
    session_start();
    require_once('conexion.php');
    //$Iden = (is_numeric($_POST['ID']))?$_POST['ID']:NULL;
    $Iden = $_POST['ID'];
    if(!is_null($Iden)){
        $_SESSION['LecturaCodigoEscolar'] = 'true';
        unset($_SESSION['NombreCompleto']);				
        unset($_SESSION['Carrera']);				
        unset($_SESSION['FechaGraduacion']);				
        unset($_SESSION['CentroUniversitario']);				
        unset($_SESSION['LecturaNombreCompleto']);				
        unset($_SESSION['LecturaCarrera']);				
        unset($_SESSION['LecturaFechaGraduacion']);				
        unset($_SESSION['LecturaCentroUniversitario']);				
        unset($_SESSION['LecturaCodigoEscolar']);				
        unset($_SESSION['bNombreCompleto']);
        unset($_SESSION['bCarrera']);
        unset($_SESSION['bFechaGraduacion']);
        unset($_SESSION['bCentroUniversitario']);
        $_SESSION['NombreCompleto'] = null;
		$_SESSION['Carrera'] =null;
		$_SESSION['FechaGraduacion'] = null;
		$_SESSION['CentroUniversitario'] = null;
        $_SESSION['bNombreCompleto'] = 0;
		$_SESSION['bCarrera'] =0;
		$_SESSION['bFechaGraduacion'] = 0;
		$_SESSION['bCentroUniversitario'] = 0;
        $Consulta = "SELECT * FROM  DBUDEG.dbo.BaseTrabajar WHERE CodigoEscolar = '".$Iden."'";
        $Fila = sqlsrv_query($conn,$Consulta);
        $filaquerie1 = sqlsrv_fetch_array($Fila);
        $_SESSION['Incorrecto'] = $Iden;
        if($filaquerie1 > 0){
            //echo "<script>alert('Existe Registro en la base de datos.'); </script>";
            if (strlen(trim($filaquerie1['NombreCompleto'])) > 0) {
                $_SESSION['NombreCompleto'] = $filaquerie1['NombreCompleto'];
                $_SESSION['LecturaNombreCompleto'] = 'true';                
            } else {
                $_SESSION['bNombreCompleto'] = 1;
            }
            if (strlen(trim($filaquerie1['Carrera'])) > 0) {
                $_SESSION['Carrera'] = $filaquerie1['Carrera'];
                $_SESSION['LecturaCarrera'] = 'true';                
            } else {
                $_SESSION['bCarrera'] = 1;
            }
            if (strlen(trim($filaquerie1['FechaGraduacion'])) > 0) {
                $_SESSION['FechaGraduacion'] = $filaquerie1['FechaGraduacion'];
                $_SESSION['LecturaFechaGraduacion'] = 'true';                
            } else {
                $_SESSION['bFechaGraduacion'] = 1;
            }
            if (strlen(trim($filaquerie1['CentroUniversitario'])) > 0) {
                $_SESSION['CentroUniversitario'] = $filaquerie1['CentroUniversitario'];
                $_SESSION['LecturaCentroUniversitario'] = 'true';                
            } else {
                $_SESSION['bCentroUniversitario'] = 1;
            }
            $_SESSION['bGlobal'] = 	$_SESSION['bCentroUniversitario'] + $_SESSION['bFechaGraduacion'] + $_SESSION['bCarrera'] + $_SESSION['bNombreCompleto'] ;
            ?>
            <script>
                $("input[name='NombreCompleto']").val("<?php echo $_SESSION['NombreCompleto'];?>");
                $("input[name='Carrera']").val("<?php echo $_SESSION['Carrera'];?>");
                $("input[name='FechaGraduacion']").val("<?php echo $_SESSION['FechaGraduacion'];?>");
                $("input[name='CentroUniversitario']").val("<?php echo $_SESSION['CentroUniversitario'];?>");
            </script>
<?php    
 	            echo'<script type="text/javascript">
                alert("Existe Registro en la base de datos."); 
                location.href="captura.php";
                </script>';
        } else {
                echo'<script type="text/javascript">
                    alert("No hay valores que coincidan con la búsqueda."); 
                    location.href="captura.php";
                    </script>';
        }        
    } else {
        echo "<script>alert('Debe de Introducir un No. de Codigo valido.'); </script>";
    }
?>