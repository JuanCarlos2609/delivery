<?php
    session_set_cookie_params(0); // Hace que la sesión expire al cerrar el navegador
	//header("Refresh:70; URL='capturaudeg.php'");
	ini_set('display_errors','1');
	session_start();

	function InicializaVariables()
	{
		$_SESSION['NombreCompleto'] = null;
		$_SESSION['Carrera'] =null;
		$_SESSION['FechaGraduacion'] = null;
		$_SESSION['CentroUniversitario'] = null;
		$_SESSION['Carrera2'] =null;
		$_SESSION['FechaGraduacion2'] = null;
		$_SESSION['CentroUniversitario2'] = null;
		$_SESSION['Carrera3'] =null;
		$_SESSION['FechaGraduacion3'] = null;
		$_SESSION['CentroUniversitario3'] = null;
		$_SESSION['Carrera4'] =null;
		$_SESSION['FechaGraduacion4'] = null;
		$_SESSION['CentroUniversitario4'] = null;
		$_SESSION['Carrera5'] =null;
		$_SESSION['FechaGraduacion5'] = null;
		$_SESSION['CentroUniversitario5'] = null;
		$_SESSION['bNombreCompleto'] = 0;
		$_SESSION['bCarrera'] =0;
		$_SESSION['bFechaGraduacion'] = 0;
		$_SESSION['bCentroUniversitario'] = 0;
		$_SESSION['bCarrera2'] =0;
		$_SESSION['bFechaGraduacion2'] = 0;
		$_SESSION['bCentroUniversitario2'] = 0;
		$_SESSION['bCarrera3'] =0;
		$_SESSION['bFechaGraduacion3'] = 0;
		$_SESSION['bCentroUniversitario3'] = 0;
		$_SESSION['bCarrera4'] =0;
		$_SESSION['bFechaGraduacion4'] = 0;
		$_SESSION['bCentroUniversitario4'] = 0;
		$_SESSION['bCarrera5'] =0;
		$_SESSION['bFechaGraduacion5'] = 0;
		$_SESSION['bCentroUniversitario5'] = 0;
		$_SESSION['bCodigoEscolar'] = 0;
	}


	if ((isset($_SESSION['administradorudeg']) || isset($_SESSION['capturaudeg']))) {		
	} else {
		echo'<script type="text/javascript">;
			alert("Al Modulo de Captura, Debes de Iniciar por el Login");
			location.href="cerrar_sesion.php";
			window.close();
			</script>';
  	}
	include 'conexion.php';
	$UsuarioCaptura = $_SESSION['loginudeg'];
	$_SESSION['bGlobal'] = 0;
	date_default_timezone_set('America/Mexico_City');    
    $Hora= date(' h:i:s a', time()); 
	$_SESSION['bSinRevision']='NO';
	if (!isset($_SESSION['EresDuda'])) {
		$_SESSION['EresDuda'] = null;
	}
	if (!isset($_SESSION['amdhms'])) {
		$_SESSION['amdhms'] = null;
	}
	if (!isset($_SESSION['codigobarras'])) {
		$_SESSION['codigobarras'] = null;
	}
	if (!isset($_SESSION['SecuenciaDocumentos'])) {
		$_SESSION['SecuenciaDocumentos'] = null;
	}
	if (isset($_SESSION['NombreCompleto'])) {
		$_SESSION['NombreCompleto'] = str_replace("_", " ", $_SESSION['NombreCompleto']);
	} else {
		$_SESSION['NombreCompleto'] = null;
	}
	if (isset($_SESSION['Carrera'])) {
		$_SESSION['Carrera'] = str_replace("_", " ", $_SESSION['Carrera']);
	} else {
		$_SESSION['Carrera'] = null;
	}
	if (isset($_SESSION['FechaGraduacion'])) {
		$_SESSION['FechaGraduacion'] = str_replace("_", " ", $_SESSION['FechaGraduacion']);
	} else {
		$_SESSION['FechaGraduacion'] = null;
	}
	if (isset($_SESSION['CentroUniversitario'])) {
		$_SESSION['CentroUniversitario'] = str_replace("_", " ", $_SESSION['CentroUniversitario']);
	} else {
		$_SESSION['CentroUniversitario'] = null;
	}
	if (isset($_SESSION['Carrera2'])) {
		$_SESSION['Carrera2'] = str_replace("_", " ", $_SESSION['Carrera2']);
	} else {
		$_SESSION['Carrera2'] = null;
	}
	if (isset($_SESSION['FechaGraduacion2'])) {
		$_SESSION['FechaGraduacion2'] = str_replace("_", " ", $_SESSION['FechaGraduacion2']);
	} else {
		$_SESSION['FechaGraduacion2'] = null;
	}
	if (isset($_SESSION['CentroUniversitario2'])) {
		$_SESSION['CentroUniversitario2'] = str_replace("_", " ", $_SESSION['CentroUniversitario2']);
	} else {
		$_SESSION['CentroUniversitario2'] = null;
	}
	if (isset($_SESSION['Carrera3'])) {
		$_SESSION['Carrera3'] = str_replace("_", " ", $_SESSION['Carrera3']);
	} else {
		$_SESSION['Carrera3'] = null;
	}
	if (isset($_SESSION['FechaGraduacion3'])) {
		$_SESSION['FechaGraduacion3'] = str_replace("_", " ", $_SESSION['FechaGraduacion3']);
	} else {
		$_SESSION['FechaGraduacion3'] = null;
	}
	if (isset($_SESSION['CentroUniversitario3'])) {
		$_SESSION['CentroUniversitario3'] = str_replace("_", " ", $_SESSION['CentroUniversitario3']);
	} else {
		$_SESSION['CentroUniversitario3'] = null;
	}
	if (isset($_SESSION['Carrera4'])) {
		$_SESSION['Carrera4'] = str_replace("_", " ", $_SESSION['Carrera4']);
	} else {
		$_SESSION['Carrera4'] = null;
	}
	if (isset($_SESSION['FechaGraduacion4'])) {
		$_SESSION['FechaGraduacion4'] = str_replace("_", " ", $_SESSION['FechaGraduacion4']);
	} else {
		$_SESSION['FechaGraduacion4'] = null;
	}
	if (isset($_SESSION['CentroUniversitario4'])) {
		$_SESSION['CentroUniversitario4'] = str_replace("_", " ", $_SESSION['CentroUniversitario4']);
	} else {
		$_SESSION['CentroUniversitario4'] = null;
	}
	if (isset($_SESSION['Carrera5'])) {
		$_SESSION['Carrera5'] = str_replace("_", " ", $_SESSION['Carrera5']);
	} else {
		$_SESSION['Carrera5'] = null;
	}
	if (isset($_SESSION['FechaGraduacion5'])) {
		$_SESSION['FechaGraduacion5'] = str_replace("_", " ", $_SESSION['FechaGraduacion5']);
	} else {
		$_SESSION['FechaGraduacion5'] = null;
	}
	if (isset($_SESSION['CentroUniversitario5'])) {
		$_SESSION['CentroUniversitario5'] = str_replace("_", " ", $_SESSION['CentroUniversitario5']);
	} else {
		$_SESSION['CentroUniversitario5'] = null;
	}
	if (!isset($_SESSION['CodigoEscolar'])) {
		$_SESSION['CodigoEscolar'] = null;
	}
	if (!isset($_SESSION['LecturaNombreCompleto'])) {
		$_SESSION['LecturaNombreCompleto'] = 'false';
	}
	if (!isset($_SESSION['LecturaCarrera'])) {
		$_SESSION['LecturaCarrera'] = 'false';
	}
	if (!isset($_SESSION['LecturaFechaGraduacion'])) {
		$_SESSION['LecturaFechaGraduacion'] = 'false';
	}
	if (!isset($_SESSION['LecturaCentroUniversitario'])) {
		$_SESSION['LecturaCentroUniversitario'] = 'false';
	}
	if (!isset($_SESSION['LecturaCarrera2'])) {
		$_SESSION['LecturaCarrera2'] = 'false';
	}
	if (!isset($_SESSION['LecturaFechaGraduacion2'])) {
		$_SESSION['LecturaFechaGraduacion2'] = 'false';
	}
	if (!isset($_SESSION['LecturaCentroUniversitario2'])) {
		$_SESSION['LecturaCentroUniversitario2'] = 'false';
	}
	if (!isset($_SESSION['LecturaCarrera3'])) {
		$_SESSION['LecturaCarrera3'] = 'false';
	}
	if (!isset($_SESSION['LecturaFechaGraduacion3'])) {
		$_SESSION['LecturaFechaGraduacion3'] = 'false';
	}
	if (!isset($_SESSION['LecturaCentroUniversitario3'])) {
		$_SESSION['LecturaCentroUniversitario3'] = 'false';
	}
	if (!isset($_SESSION['LecturaCarrera4'])) {
		$_SESSION['LecturaCarrera4'] = 'false';
	}
	if (!isset($_SESSION['LecturaFechaGraduacion4'])) {
		$_SESSION['LecturaFechaGraduacion4'] = 'false';
	}
	if (!isset($_SESSION['LecturaCentroUniversitario4'])) {
		$_SESSION['LecturaCentroUniversitario4'] = 'false';
	}
	if (!isset($_SESSION['LecturaCarrera5'])) {
		$_SESSION['LecturaCarrera5'] = 'false';
	}
	if (!isset($_SESSION['LecturaFechaGraduacion5'])) {
		$_SESSION['LecturaFechaGraduacion5'] = 'false';
	}
	if (!isset($_SESSION['LecturaCentroUniversitario5'])) {
		$_SESSION['LecturaCentroUniversitario5'] = 'false';
	}
    if (!isset($_SESSION['LecturaCodigoEscolar'])) {
		$_SESSION['LecturaCodigoEscolar'] = 'false';
	}
	if (isset($_SESSION['NombrePdf'])) {
		$ArchivoPdf = $_SESSION['NombrePdf'];
	} else {
		$_SESSION['NombrePdf'] = null;
		$ArchivoPdf = null;
	}		
	if (isset($_SESSION['mostrar'])) {
		$Mostrar = $_SESSION['mostrar'];
	} else {
		$Mostrar = null;
	}		
	if (isset($_SESSION['Incorrecto'])) {
		$visual = 'block';
		$CodigoEscolarCorregido = $_SESSION['Incorrecto'];
		$incorrecto = 'checked';
	} else {
		$_SESSION['Incorrecto'] = null;
		$visual = 'none';
		$CodigoEscolarCorregido = null;
		$incorrecto = 'unchecked';
	}
    $Comentarios="";
	$cbNombreCompleto = 'unchecked';
	$cbCarrera = 'unchecked';
	$cbFechaGraduacion = 'unchecked';
	$cbCentroUniversitario = 'unchecked';
	$cbCarrera2 = 'unchecked';
	$cbFechaGraduacion2 = 'unchecked';
	$cbCentroUniversitario2 = 'unchecked';
	$cbCarrera3 = 'unchecked';
	$cbFechaGraduacion3 = 'unchecked';
	$cbCentroUniversitario3 = 'unchecked';
	$cbCarrera4 = 'unchecked';
	$cbFechaGraduacion4 = 'unchecked';
	$cbCentroUniversitario4 = 'unchecked';
	$cbCarrera5 = 'unchecked';
	$cbFechaGraduacion5 = 'unchecked';
	$cbCentroUniversitario5 = 'unchecked';
	$VariosExpedientes = 'unchecked';
	$ImagenesRotadas = 'unchecked';
	$ImagenesBlancas = 'unchecked';
	$ErrorPdfDañado = 'unchecked';
    if (!isset($_SESSION['ActivoProcesar'])) {
		$_SESSION['ActivoProcesar'] = 'disabled';;
	}
    if (!isset($_SESSION['ActivoGuardar'])) {
		$_SESSION['ActivoGuardar'] = 'disabled';;
	}
    if (!isset($_SESSION['ActivoObtener'])) {
		$_SESSION['ActivoObtener'] = 'enabled';;
	}
    if (!isset($_SESSION['ActivoDuda'])) {
		$_SESSION['ActivoDuda'] = 'enabled';;
	}
	if (!isset($_SESSION['bNombreCompleto'])) {
		$_SESSION['bNombreCompleto'] = 0;
	}
	if (!isset($_SESSION['bCarrera'])) {
		$_SESSION['bCarrera'] = 0;
	}
	if (!isset($_SESSION['bFechaGraduacion'])) {
		$_SESSION['bFechaGraduacion'] = 0;
	}
	if (!isset($_SESSION['bCentroUniversitario'])) {
		$_SESSION['bCentroUniversitario'] = 0;
	}
	if (!isset($_SESSION['bCarrera2'])) {
		$_SESSION['bCarrera2'] = 0;
	}
	if (!isset($_SESSION['bFechaGraduacion2'])) {
		$_SESSION['bFechaGraduacion2'] = 0;
	}
	if (!isset($_SESSION['bCentroUniversitario2'])) {
		$_SESSION['bCentroUniversitario2'] = 0;
	}
	if (!isset($_SESSION['bCarrera3'])) {
		$_SESSION['bCarrera3'] = 0;
	}
	if (!isset($_SESSION['bFechaGraduacion3'])) {
		$_SESSION['bFechaGraduacion3'] = 0;
	}
	if (!isset($_SESSION['bCentroUniversitario3'])) {
		$_SESSION['bCentroUniversitario3'] = 0;
	}
	if (!isset($_SESSION['bCarrera4'])) {
		$_SESSION['bCarrera4'] = 0;
	}
	if (!isset($_SESSION['bFechaGraduacion4'])) {
		$_SESSION['bFechaGraduacion4'] = 0;
	}
	if (!isset($_SESSION['bCentroUniversitario4'])) {
		$_SESSION['bCentroUniversitario4'] = 0;
	}
	if (!isset($_SESSION['bCarrera5'])) {
		$_SESSION['bCarrera5'] = 0;
	}
	if (!isset($_SESSION['bFechaGraduacion5'])) {
		$_SESSION['bFechaGraduacion5'] = 0;
	}
	if (!isset($_SESSION['bCentroUniversitario5'])) {
		$_SESSION['bCentroUniversitario5'] = 0;
	}
	if (!isset($_SESSION['bCodigoEscolar'])) {
		$_SESSION['bCodigoEscolar'] = 0;
	}
	if (isset($_POST['obtener'])) {
		//$_SESSION['tiempo'] = time();
        $_SESSION['ActivoProcesar'] = 'enabled';  
        $_SESSION['ActivoGuardar'] = 'enabled';
        $_SESSION['ActivoObtener'] = 'disabled';  
        $_SESSION['ActivoDuda'] = 'disabled';
        $_SESSION['amdhms'] = null;
		usleep(rand(200,900));
		$ContadorExp = 0;
		while ($ContadorExp < 1)	
		{	
			$Expedientes = "SELECT NombrePdf, TIPO1_NOSOLICITUD FROM DBUDEG.dbo.Digitalizacion WITH(NOLOCK)  WHERE UsuarioDigitalizacion = '$_SESSION[loginudeg]' and estatus is NULL  ORDER BY NEWID()";
			/*$Expedientes = "SELECT CodigoBarras, SecuenciaDocumentos, NombrePdf, TIPO1_NOSOLICITUD FROM DBUDEG.dbo.Digitalizacion WITH(NOLOCK)  WHERE UsuarioDigitalizacion = '$_SESSION[loginudeg]' and estatus is NULL  ORDER BY NEWID()";
			$fh = fopen("fichero/queryobtener.txt", 'w') or die("Se produjo un error al crear el archivo");
			fwrite($fh, $Expedientes) or die("No se pudo escribir en el archivo");			
			fclose($fh);*/
			$Expediente = SQLSRV_QUERY($conn,$Expedientes);
			$ObtencionExpediente = SQLSRV_FETCH_ARRAY($Expediente,SQLSRV_FETCH_ASSOC);
			if ($ObtencionExpediente > 0) {
				InicializaVariables();
				$_SESSION['codigobarras'] = $ObtencionExpediente['NombrePdf'];
				$_SESSION['SecuenciaDocumentos'] = $ObtencionExpediente['NombrePdf'];
				$_SESSION['NombrePdf'] = $ObtencionExpediente['NombrePdf'];
				$_SESSION['CodigoEscolar'] = strtoupper($ObtencionExpediente['TIPO1_NOSOLICITUD']);
				$ArchivoPdf = $_SESSION['NombrePdf'];
				$directorio = "pdf/$ArchivoPdf";
				/*echo'<script type="text/javascript">
				alert("ArchivoPdf ['.$ArchivoPdf.']");
				</script>';   	*/		
				if (file_exists($directorio)) {
					$ContadorExp = 2;	
					$update_checklist = "UPDATE DBUDEG.dbo.Digitalizacion SET estatus = 0 WHERE NombrePdf = '$_SESSION[NombrePdf]'";
					/*$update_checklist = "UPDATE DBUDEG.dbo.Digitalizacion SET estatus = 0, Usuario = '$_SESSION[loginudeg]' WHERE CodigoBarras = '$_SESSION[codigobarras]' and SecuenciaDocumentos = '$_SESSION[SecuenciaDocumentos]' and TIPO1_NOSOLICITUD = '$_SESSION[CodigoEscolar]'";*/
					$resp_checklist = sqlsrv_prepare($conn,$update_checklist);
					if (sqlsrv_execute($resp_checklist)) {	
						$Mostrar = $directorio;
						$_SESSION ['mostrar'] = $Mostrar;
						if (strlen(trim($_SESSION['CodigoEscolar'])) > 4) {
							$select = "SELECT * FROM  DBUDEG.dbo.BaseTrabajar WHERE CodigoEscolar = '".$_SESSION['CodigoEscolar']."'";
							$respuesta = SQLSRV_QUERY($conn,$select);
							$filaquerie1 = SQLSRV_FETCH_ARRAY($respuesta, SQLSRV_FETCH_ASSOC);
							if ($filaquerie1 > 0) {
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
									$fechaformatocorrecto = $filaquerie1['FechaGraduacion'];
                                    /*echo'<script type="text/javascript">
	                    			alert("fechaformatocorrecto ['.$fechaformatocorrecto.']");
				                    </script>'; 
                                    //2015-02-02;*/
                                    $_SESSION['FechaGraduacion'] = substr($fechaformatocorrecto, 8, 2) . '/' . substr($fechaformatocorrecto, 5, 2) . '/' . substr($fechaformatocorrecto, 0, 4);
									$_SESSION['LecturaFechaGraduacion'] = 'true';     
                                    /*echo'<script type="text/javascript">
	                    			alert("FechaGraduacion ['.$_SESSION['FechaGraduacion'].']");
				                    </script>';  */ 	           
								} else {
									$_SESSION['bFechaGraduacion'] = 1;
								}                                	
								if (strlen(trim($filaquerie1['CentroUniversitario'])) > 0) {
									$_SESSION['CentroUniversitario'] = $filaquerie1['CentroUniversitario'];
									$_SESSION['LecturaCentroUniversitario'] = 'true';                
								} else {
									$_SESSION['bCentroUniversitario'] = 1;
								}
                                $_SESSION['LecturaCarrera2'] = 'true';
                                $_SESSION['LecturaFechaGraduacion2'] = 'true';
                                $_SESSION['LecturaCentroUniversitario2'] = 'true';
                                $_SESSION['LecturaCarrera3'] = 'true';
                                $_SESSION['LecturaFechaGraduacion3'] = 'true';
                                $_SESSION['LecturaCentroUniversitario3'] = 'true';
                                $_SESSION['LecturaCarrera4'] = 'true';
                                $_SESSION['LecturaFechaGraduacion4'] = 'true';
                                $_SESSION['LecturaCentroUniversitario4'] = 'true';
                                $_SESSION['LecturaCarrera5'] = 'true';
                                $_SESSION['LecturaFechaGraduacion5'] = 'true';
                                $_SESSION['LecturaCentroUniversitario5'] = 'true';
							}else {
                                $_SESSION['LecturaNombreCompleto'] = 'true';
                                $_SESSION['LecturaCarrera'] = 'true';
                                $_SESSION['LecturaFechaGraduacion'] = 'true';
                                $_SESSION['LecturaCentroUniversitario'] = 'true';
                                $_SESSION['LecturaCarrera2'] = 'true';
                                $_SESSION['LecturaFechaGraduacion2'] = 'true';
                                $_SESSION['LecturaCentroUniversitario2'] = 'true';
                                $_SESSION['LecturaCarrera3'] = 'true';
                                $_SESSION['LecturaFechaGraduacion3'] = 'true';
                                $_SESSION['LecturaCentroUniversitario3'] = 'true';
                                $_SESSION['LecturaCarrera4'] = 'true';
                                $_SESSION['LecturaFechaGraduacion4'] = 'true';
                                $_SESSION['LecturaCentroUniversitario4'] = 'true';
                                $_SESSION['LecturaCarrera5'] = 'true';
                                $_SESSION['LecturaFechaGraduacion5'] = 'true';
                                $_SESSION['LecturaCentroUniversitario5'] = 'true';
                                $_SESSION['LecturaCodigoEscolar'] = 'true';
                                echo'<script type="text/javascript">
                                alert("No Existe Expediente con el Codigo Escolar mostrado en la base de datos, Seleccione INCORRECTO y Capture nuevo NO SOLICITUD");
                                </script>'; 	
							}		
						} else {
                            $_SESSION['LecturaNombreCompleto'] = 'true';
                            $_SESSION['LecturaCarrera'] = 'true';
                            $_SESSION['LecturaFechaGraduacion'] = 'true';
                            $_SESSION['LecturaCentroUniversitario'] = 'true';
                            $_SESSION['LecturaCarrera2'] = 'true';
                            $_SESSION['LecturaFechaGraduacion2'] = 'true';
                            $_SESSION['LecturaCentroUniversitario2'] = 'true';
                            $_SESSION['LecturaCarrera3'] = 'true';
                            $_SESSION['LecturaFechaGraduacion3'] = 'true';
                            $_SESSION['LecturaCentroUniversitario3'] = 'true';
                            $_SESSION['LecturaCarrera4'] = 'true';
                            $_SESSION['LecturaFechaGraduacion4'] = 'true';
                            $_SESSION['LecturaCentroUniversitario4'] = 'true';
                            $_SESSION['LecturaCarrera5'] = 'true';
                            $_SESSION['LecturaFechaGraduacion5'] = 'true';
                            $_SESSION['LecturaCentroUniversitario5'] = 'true';
                            $_SESSION['LecturaCodigoEscolar'] = 'true';
                            echo'<script type="text/javascript">
                            alert("No Existe Expediente con el Codigo Escolar mostrado en la base de datos, Seleccione INCORRECTO y Capture nuevo Codigo Escolar");
                            </script>'; 	
                    }						
					} else {
						echo'<script type="text/javascript">
						alert("Favor de Salirse y volver a seleccionar el expediente, no se pudo actualizar");
						</script>';   
					}
				}
				else{
					$ContadorExp = 2;
					echo'<script type="text/javascript">
					alert("Archivo no Encontrado o Dañado ['.$directorio.']");
					</script>';   
				}
			} else { /* NO hay Archivos por procesar en obtener*/
				$ContadorExp = 2;
                $_SESSION['ActivoProcesar'] = 'disabled';
                $_SESSION['ActivoGuardar'] = 'disabled';
                $_SESSION['ActivoDuda'] = 'enabled';
                $_SESSION['ActivoObtener'] = 'disabled';
				echo'<script type="text/javascript">
				alert("No hay Expedientes para capturar, Espere hasta que el sistema encuentre Expedientes.");
				</script>';
			}
		}
	}
	if (isset($_POST['ObtenerDuda'])) {
		//$_SESSION['tiempo'] = time();
        $_SESSION['EresDuda'] = "SI";
        $_SESSION['ActivoProcesar'] = 'enabled';
        $_SESSION['ActivoGuardar'] = 'enabled';
        $_SESSION['ActivoDuda'] = 'disabled';
        $_SESSION['ActivoObtener'] = 'disabled';
		usleep(rand(200,900));
		$ContadorExp = 0;
		while ($ContadorExp < 1)	
		{	
			$Expedientes = "SELECT top 1 amdhms,CodigoBarras,SecuenciaDocumentos,NombrePdf,CodigoEscolar,CodigoEscolarCorregido,ComentarioExpediente,NombreCompleto,Carrera,FechaGraduacion,CentroUniversitario,Carrera2,FechaGraduacion2,CentroUniversitario2,Carrera3,FechaGraduacion3,CentroUniversitario3,Carrera4,FechaGraduacion4,CentroUniversitario4,Carrera5,FechaGraduacion5,CentroUniversitario5,Usuario,ImagenRotada,HojasBlancas FROM DBUDEG.dbo.Duda WITH(NOLOCK)  WHERE Usuario = '$_SESSION[loginudeg]' and Estatus = 'PENDIENTE' ORDER BY NEWID()";
			/*$fh = fopen("fichero/queryobtener.txt", 'w') or die("Se produjo un error al crear el archivo");
			fwrite($fh, $Expedientes) or die("No se pudo escribir en el archivo");			
			fclose($fh);*/
			$Expediente = SQLSRV_QUERY($conn,$Expedientes);
			$ObtencionExpediente = SQLSRV_FETCH_ARRAY($Expediente,SQLSRV_FETCH_ASSOC);
			if ($ObtencionExpediente > 0) {
				/*InicializaVariables();*/
				$_SESSION['codigobarras'] = $ObtencionExpediente['CodigoBarras'];
				$_SESSION['SecuenciaDocumentos'] = $ObtencionExpediente['SecuenciaDocumentos'];
				$_SESSION['NombrePdf'] = $ObtencionExpediente['NombrePdf'];
                $_SESSION['amdhms'] = $ObtencionExpediente['amdhms'];
				$ArchivoPdf = $_SESSION['NombrePdf'];
				$directorio = "pdf/$ArchivoPdf";
                $Mostrar = $directorio;
                $_SESSION ['mostrar'] = $Mostrar; 
                $LlaveMuestra = $_SESSION['codigobarras'] . '_' . $_SESSION['SecuenciaDocumentos'] . '_' . $_SESSION['loginudeg'];
                /*echo'<script type="text/javascript">
                alert("LlaveMuestra ['.$LlaveMuestra.']");
                </script>'; */  
				if (file_exists($directorio)) {
					$ContadorExp = 2;	
                    if (strlen(trim($ObtencionExpediente['CodigoEscolar'])) > 0) {
                        $_SESSION['CodigoEscolar'] = $ObtencionExpediente['CodigoEscolar'];
                        $_SESSION['LecturaCodigoEscolar'] = 'true';                
                    } else {
                        $_SESSION['bCodigoEscolar'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['NombreCompleto'])) > 0) {
                        $_SESSION['NombreCompleto'] = $ObtencionExpediente['NombreCompleto'];
                        $_SESSION['LecturaNombreCompleto'] = 'true';                
                    } else {
                        $_SESSION['bNombreCompleto'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['Carrera'])) > 0) {
                        $_SESSION['Carrera'] = $ObtencionExpediente['Carrera'];
                        $_SESSION['LecturaCarrera'] = 'true';                
                    } else {
                        $_SESSION['bCarrera'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['FechaGraduacion'])) > 0) {
                        $_SESSION['FechaGraduacion'] = $ObtencionExpediente['FechaGraduacion'];
                        $_SESSION['LecturaFechaGraduacion'] = 'true';                
                    } else {
                        $_SESSION['bFechaGraduacion'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['CentroUniversitario'])) > 0) {
                        $_SESSION['CentroUniversitario'] = $ObtencionExpediente['CentroUniversitario'];
                        $_SESSION['LecturaCentroUniversitario'] = 'true';                
                    } else {
                        $_SESSION['bCentroUniversitario'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['Carrera2'])) > 0) {
                        $_SESSION['Carrera2'] = $ObtencionExpediente['Carrera'];
                        $_SESSION['LecturaCarrera2'] = 'true';                
                    } else {
                        $_SESSION['bCarrera2'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['FechaGraduacion2'])) > 0) {
                        $_SESSION['FechaGraduacion2'] = $ObtencionExpediente['FechaGraduacion2'];
                        $_SESSION['LecturaFechaGraduacion2'] = 'true';                
                    } else {
                        $_SESSION['bFechaGraduacion2'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['CentroUniversitario2'])) > 0) {
                        $_SESSION['CentroUniversitario2'] = $ObtencionExpediente['CentroUniversitario2'];
                        $_SESSION['LecturaCentroUniversitario2'] = 'true';                
                    } else {
                        $_SESSION['bCentroUniversitario2'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['Carrera3'])) > 0) {
                        $_SESSION['Carrera3'] = $ObtencionExpediente['Carrera3'];
                        $_SESSION['LecturaCarrera3'] = 'true';                
                    } else {
                        $_SESSION['bCarrera3'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['FechaGraduacion3'])) > 0) {
                        $_SESSION['FechaGraduacion3'] = $ObtencionExpediente['FechaGraduacion3'];
                        $_SESSION['LecturaFechaGraduacion3'] = 'true';                
                    } else {
                        $_SESSION['bFechaGraduacion3'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['CentroUniversitario3'])) > 0) {
                        $_SESSION['CentroUniversitario3'] = $ObtencionExpediente['CentroUniversitario3'];
                        $_SESSION['LecturaCentroUniversitario3'] = 'true';                
                    } else {
                        $_SESSION['bCentroUniversitario3'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['Carrera4'])) > 0) {
                        $_SESSION['Carrera4'] = $ObtencionExpediente['Carrera4'];
                        $_SESSION['LecturaCarrera4'] = 'true';                
                    } else {
                        $_SESSION['bCarrera4'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['FechaGraduacion4'])) > 0) {
                        $_SESSION['FechaGraduacion4'] = $ObtencionExpediente['FechaGraduacion4'];
                        $_SESSION['LecturaFechaGraduacion4'] = 'true';                
                    } else {
                        $_SESSION['bFechaGraduacion4'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['CentroUniversitario4'])) > 0) {
                        $_SESSION['CentroUniversitario4'] = $ObtencionExpediente['CentroUniversitario4'];
                        $_SESSION['LecturaCentroUniversitario4'] = 'true';                
                    } else {
                        $_SESSION['bCentroUniversitario4'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['Carrera5'])) > 0) {
                        $_SESSION['Carrera5'] = $ObtencionExpediente['Carrera5'];
                        $_SESSION['LecturaCarrera5'] = 'true';                
                    } else {
                        $_SESSION['bCarrera5'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['FechaGraduacion5'])) > 0) {
                        $_SESSION['FechaGraduacion5'] = $ObtencionExpediente['FechaGraduacion5'];
                        $_SESSION['LecturaFechaGraduacion5'] = 'true';                
                    } else {
                        $_SESSION['bFechaGraduacion5'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['CentroUniversitario5'])) > 0) {
                        $_SESSION['CentroUniversitario5'] = $ObtencionExpediente['CentroUniversitario5'];
                        $_SESSION['LecturaCentroUniversitario5'] = 'true';                
                    } else {
                        $_SESSION['bCentroUniversitario5'] = 1;
                    }

                    if (strlen(trim($ObtencionExpediente['ImagenRotada'])) > 0) {
                        $validacionTmp = $ObtencionExpediente['ImagenRotada'];
                        if ($validacionTmp == "SI"){
                            $ImagenesRotadas = 'checked';
                        } else {
                            $ImagenesRotadas = 'unchecked';
                        }                        
                    } else {
                        $ImagenesRotadas = 'unchecked';
                    }
                    if (strlen(trim($ObtencionExpediente['HojasBlancas'])) > 0) {
                        $validacionTmp = $ObtencionExpediente['HojasBlancas'];
                        if ($validacionTmp == "SI"){
                            $ImagenesBlancas = 'checked';
                        } else {
                            $ImagenesBlancas = 'unchecked';
                        }                        
                    } else {
                        $ImagenesBlancas = 'unchecked';
                    }
                    if (strlen(trim($ObtencionExpediente['CentroUniversitario5'])) > 0) {
                        $_SESSION['CentroUniversitario5'] = $ObtencionExpediente['CentroUniversitario5'];
                        $_SESSION['LecturaCentroUniversitario5'] = 'true';                
                    } else {
                        $_SESSION['bCentroUniversitario5'] = 1;
                    }
                    if (strlen(trim($ObtencionExpediente['ComentarioExpediente'])) > 0) {
                        $Comentarios = $ObtencionExpediente['ComentarioExpediente'];
                    } 
                    if (strlen(trim($ObtencionExpediente['CodigoEscolarCorregido'])) > 0) {
                        $CodigoEscolarCorregido = $ObtencionExpediente['CodigoEscolarCorregido'];
                        $visual = 'block';
                        $incorrecto = 'checked';
                    } else {
                        $visual = 'none';
                        $CodigoEscolarCorregido = null;
                        $incorrecto = 'unchecked';
                    } 
                    $_SESSION['EresDuda'] = "SI";   
                    //Aqui
                    $update_checklist = "UPDATE DBUDEG.dbo.Duda SET estatus = 'RESUELTA', Bloqueado = 'SI' WHERE CodigoBarras = '$_SESSION[codigobarras]' and SecuenciaDocumentos = '$_SESSION[SecuenciaDocumentos]' and Usuario = '$_SESSION[loginudeg]' and Estatus = 'PENDIENTE'";
					$resp_checklist = sqlsrv_prepare($conn,$update_checklist);
					if (sqlsrv_execute($resp_checklist)) 
                    {	
                        echo'<script type="text/javascript">
                        alert("Registro Encontrado");
                        </script>';                           
                    } else {
                        echo'<script type="text/javascript">
                        alert("Registro NO Actualizado ['.$LlaveMuestra.']");
                        </script>';       
                    }
				} else{
					$ContadorExp = 2;
					echo'<script type="text/javascript">
					alert("Archivo no Encontrado o Dañado ['.$directorio.']");
					</script>';   
                    $_SESSION['EresDuda'] = "NO";   
				}
			} else { /* No hay Archivos pormprocesr de dudas*/
				$ContadorExp = 2;
                $_SESSION['ActivoProcesar'] = 'disabled';
                $_SESSION['ActivoGuardar'] = 'disabled';
                $_SESSION['ActivoDuda'] = 'disabled';
                $_SESSION['ActivoObtener'] = 'enabled';
                $_SESSION['EresDuda'] = "NO";        
				echo'<script type="text/javascript">
				alert("No hay Expedientes en Duda para capturar.");
				</script>';
			}
		}
	}
	if(isset($_POST['CANCELAR'])){
		//$_SESSION['tiempo'] = time();
		$Existe = 0;
        if (isset($_SESSION['ActivoObtener'])) {
            unset($_SESSION['ActivoObtener']);
        }
        if (isset($_SESSION['ActivoDuda'])) {
            unset($_SESSION['ActivoDuda']);
        }
        if (isset($_SESSION['ActivoGuardar'])) {
            unset($_SESSION['ActivoGuardar']);
        }
        if (isset($_SESSION['ActivoProcesar'])) {
            unset($_SESSION['ActivoProcesar']);
        }        
		if (isset($_SESSION['codigobarras'])) {
			if (strlen($_SESSION['codigobarras'])> 5){
				$Existe = 1;
			}
		}
        if ( $Existe > 0 )
        {
            $update_checklist = null;
            if ($_SESSION['EresDuda'] == "SI")
            {
                $update_checklist = "UPDATE DBUDEG.dbo.Duda SET Estatus = 'PENDIENTE' WHERE CodigoBarras = '$_SESSION[codigobarras]' and SecuenciaDocumentos = '$_SESSION[SecuenciaDocumentos]' and amdhms = '$_SESSION[amdhms]'";
            } else 
            {
                $update_checklist = "UPDATE DBUDEG.dbo.Digitalizacion SET Estatus = null, Usuario = null WHERE nombrePdf = '$_SESSION[NombrePdf]'";
                /*$update_checklist = "UPDATE DBUDEG.dbo.BaseTrabajar SET Estatus = null WHERE CodigoEscolar = '$_SESSION[CodigoEscolar]' and Pdf = '$_SESSION[NombrePdf]'";*/
            }           
            $resp_checklist = sqlsrv_prepare($conn,$update_checklist);
            if (sqlsrv_execute($resp_checklist)) {	
                InicializaVariables();
                unset($_SESSION['EresDuda']);
                unset($_SESSION['amdhms']);
                unset($_SESSION['codigobarras']);
                unset($_SESSION['SecuenciaDocumentos']);
                unset($_SESSION['NombreCompleto']);				
                unset($_SESSION['Carrera']);				
                unset($_SESSION['FechaGraduacion']);				
                unset($_SESSION['CentroUniversitario']);				
                unset($_SESSION['Carrera2']);				
                unset($_SESSION['FechaGraduacion2']);				
                unset($_SESSION['CentroUniversitario2']);				
                unset($_SESSION['Carrera3']);				
                unset($_SESSION['FechaGraduacion3']);				
                unset($_SESSION['CentroUniversitario3']);				
                unset($_SESSION['Carrera4']);				
                unset($_SESSION['FechaGraduacion4']);				
                unset($_SESSION['CentroUniversitario4']);				
                unset($_SESSION['Carrera5']);				
                unset($_SESSION['FechaGraduacion5']);				
                unset($_SESSION['CentroUniversitario5']);				
                unset($_SESSION['CodigoEscolar']);				
                unset($_SESSION['LecturaNombreCompleto']);		
                unset($_SESSION['LecturaCarrera']);				
                unset($_SESSION['LecturaFechaGraduacion']);				
                unset($_SESSION['LecturaCentroUniversitario']);				
                unset($_SESSION['LecturaCarrera2']);				
                unset($_SESSION['LecturaFechaGraduacion2']);				
                unset($_SESSION['LecturaCentroUniversitario2']);				
                unset($_SESSION['LecturaCarrera3']);				
                unset($_SESSION['LecturaFechaGraduacion3']);				
                unset($_SESSION['LecturaCentroUniversitario3']);				
                unset($_SESSION['LecturaCarrera4']);				
                unset($_SESSION['LecturaFechaGraduacion4']);				
                unset($_SESSION['LecturaCentroUniversitario4']);				
                unset($_SESSION['LecturaCarrera5']);				
                unset($_SESSION['LecturaFechaGraduacion5']);				
                unset($_SESSION['LecturaCentroUniversitario5']);				
                unset($_SESSION['LecturaCodigoEscolar']);				
                unset($_SESSION['Incorrecto']);				
                unset($_SESSION['mostrar']);				
                unset($_SESSION['NombrePdf']);				
                unset($_SESSION['bNombreCompleto']);
                unset($_SESSION['bCarrera']);
                unset($_SESSION['bFechaGraduacion']);
                unset($_SESSION['bCentroUniversitario']);
                unset($_SESSION['bCarrera2']);
                unset($_SESSION['bFechaGraduacion2']);
                unset($_SESSION['bCentroUniversitario2']);
                unset($_SESSION['bCarrera3']);
                unset($_SESSION['bFechaGraduacion3']);
                unset($_SESSION['bCentroUniversitario3']);
                unset($_SESSION['bCarrera4']);
                unset($_SESSION['bFechaGraduacion4']);
                unset($_SESSION['bCentroUniversitario4']);
                unset($_SESSION['bCarrera5']);
                unset($_SESSION['bFechaGraduacion5']);
                unset($_SESSION['bCentroUniversitario5']);
                unset($_SESSION['bCodigoEscolar']);
                if (isset($_SESSION['ActivoObtener'])) {
                    unset($_SESSION['ActivoObtener']);
                }
                if (isset($_SESSION['ActivoDuda'])) {
                    unset($_SESSION['ActivoDuda']);
                }
                if (isset($_SESSION['ActivoGuardar'])) {
                    unset($_SESSION['ActivoGuardar']);
                }
                if (isset($_SESSION['ActivoProcesar'])) {
                    unset($_SESSION['ActivoProcesar']);
                }        
                        echo '<script type="text/javascript">
                alert("Hasta Luego, su expediente ha sido reversado");
                window.close();
                </script>';	
            } else {
                echo '<script type="text/javascript">;
                alert("Hasta Luego, su expediente no pudo reversarse Codigo Barras['.$_SESSION[codigobarras].'] Secuencia ['.$_SESSION[SecuenciaDocumentos].']");
                window.close();
                </script>';
            }
        } else {
            echo '<script type="text/javascript">
            alert("Hasta Luego");
            window.close();
            </script>';	
        }		
	}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta name="google" content="notranslate">
    <meta meta name="viewport" content="width=device-width, initial-scale=1.0" &amp;gt;>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Captura</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <!-- CSS de Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- jQuery y JS de Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/img/logonuevo.jpg" rel="icon">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="assets/img/logonuevo.jpg" />
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="style/styles.css">
    <link rel="stylesheet" type="text/css" href="style/posicion.css">
    <link rel="stylesheet" type="text/css" href="style/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <style>
    body {
      font-family: Sans-serif, Courier;
      padding: 1rem;
      background: #f4f4f4;
    }
    label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: bold;
    }
    input[type="text"] {
      padding: 0.4rem;
      font-size: 0.9rem;
      width: 200px;
    }
    Select {
      padding: 0.4rem;
      font-size: 0.9rem;
      width: 200px;
    }

  </style>
</head>

<body>
    <form method="POST" class="advanced-search-form"><br>
        <div style="width: 20%; float: left;" class="form-group">
            <button name="obtener" style="font-size: 85%;" class="btn btn-info btn-lg btn-responsive" id="cbutton" <?php
                echo $_SESSION['ActivoObtener']; ?>>Obtener Expediente</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <BUTTON name="CANCELAR" value="Cancelar" style="font-size: 80%;" class="btn btn-info btn-lg btn-responsive"
                id="cancel">Cancelar</BUTTON>&nbsp;
            <BUTTON style="position: absolute; top: 56px; left: 700px;font-size: 80%;" name="ObtenerDuda" value="Duda" class="btn btn-info btn-lg btn-responsive" id="ObtenerDuda" <?php
                echo $_SESSION['ActivoDuda'];?>>Obtener Duda</BUTTON>&nbsp;
        </div>
    </form>
    <form method="POST" action="insercion_captura.php" name="form_01" class="advanced-search-form">
        <input type="text" name="h_inicial" style="display:none;" value="<?php echo $hora; ?>" placeholder="h_inicial"
            id="h_inicial">
        <div style="width: 20%; float: left; ">
            <font style="position: absolute; top:22px; left: 295px;;" id="LabelCB" color=#30b10e><b>Codigo de barras :</b></font>
            <input style="position: absolute; top:20px; left:385px; width: 100px;" id="codbarra" type="text" readonly name="codbarra" value="<?php echo $_SESSION['codigobarras'];?>"
                onkeyup="mayus(this)">
        </div>
        <div style="width: 20%; float: left; ">
            <?php
                $NombreTemporal = $_SESSION['CodigoEscolar'];
                echo '<label style="position: absolute; top:22px; left: 510px;" id="LabelCodigoEscolar">Codigo Escolar :</label>';
                echo '<input style="position: absolute; top:20px; left: 590px; width: 100px;" id="CodigoEscolar" name="CodigoEscolar" type="text" onkeyup="mayus(this)" value="'.$NombreTemporal.'" >';
            ?>
        </div>
        <div style="width: 13%; float: left; ">
            <input type="radio" id="radio1" name="radio" value="CORRECTO" onchange="javascript:Verificadatos();">
            <label id="LabelCorrecto">CORRECTO</label>
            <input type="radio" id="radio2" name="radio" <?php echo $incorrecto ?> value="INCORRECTO"
            onchange="javascript:Verificadatos();" >
            <label id="LabelIncorrecto">INCORRECTO</label>
        </div>
        <div style="width:39%; float: right; display: none;display:<?php echo $visual;?>;" id="CodigoEscolarCorrecto">
            <font id="LabelEsc" color=#30b10e><b>Presionar ESC para consulta del Expediente</b></font>
            <label style="position: absolute; top:22px; left: 900px;color: red;" id="LabelCodigoEscolarCorrecto">Capturar Codigo Escolar Correcto :</label>
            <input style="position: absolute; top:20px; left: 1070px;width: 70px;" id="CodigoEscolarCorregido" type="text" value="<?php echo $CodigoEscolarCorregido; ?>" name="CodigoEscolarCorregido"
                onkeyup="mayus(this)">
            <div id="datos_buscador"></div>
        </div>
        </br>
        <div>
            <?php				
                /*echo '<div display: block;>';
                echo '<input type="checkbox" id="VariosExpedientes" '.$VariosExpedientes.' name="VariosExpedientes">';
                echo '<strong><label id="LabelVariosExpedientes">Varios Expedientes</label></strong>';
                echo '</div>';*/
                echo '<input type="checkbox" id="ErrorPdf" '.$ErrorPdfDañado.' name="ErrorPdf">';
                echo '<strong><label id="LabelErrorPdf">PDF DAÑADO</label></strong>';
			?>
        
            <label id="LabelComentarios">Comentarios :</label>
            <input id="comenexp" name="comenexp" type="text" value="<?php echo $Comentarios;?>" onkeyup="mayus(this)">
		
            <input type="text" name="secuenciadoc" value="<?php echo $_SESSION['SecuenciaDocumentos']; ?>"
                style="display: none;">
            <font id="LabelNombrePdf"  style="position: absolute; top:90px; left: 30px;" color=#30b10e><b>Nombre PDF:</b></font>
            <input style="position: absolute; top:88px; left:130px; width:240px;" id="pdfname" type="text" readonly name="pdfname" value="<?php echo $ArchivoPdf;?>" onkeyup="mayus(this)">
        </div>
        </br>
        </br>
        <div style="width:10%; float: right;" class="form-group">
            <input type="submit" name="Proc" onclick="return ValidaDatosSalida();"
                style="font-size: 100%;max-width: 100%" id="procesar" <?php
                echo  $_SESSION['ActivoProcesar']; ?> value="PROCESAR"
                class="btn btn-info btn-lg btn-responsive">
            <BUTTON type="submit" style="position: absolute; top: 56px; left: 790px;font-size: 80%;" name="GrabarDuda"  id="GrabarDuda" <?php echo $_SESSION['ActivoGuardar'] ;?> value="Grabar Duda" class="btn btn-info btn-lg btn-responsive">Grabar Duda</BUTTON>&nbsp;
        </div>
        <div style="width: 30%; float: left;"><br>
            <div id="contenido">
                <?php
					$NombreTemporal = $_SESSION['bSinRevision'];
					echo '<input style="display: none;" id="bSinRevision" name="bSinRevision" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bNombreCompleto'];
					echo '<input style="display: none;" id="bNombreCompleto" name="bNombreCompleto" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCarrera'];
					echo '<input style="display: none;" id="bCarrera" name="bCarrera" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bFechaGraduacion'];
					echo '<input style="display: none;" id="bFechaGraduacion" name="bFechaGraduacion" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCentroUniversitario'];
					echo '<input style="display: none;" id="bCentroUniversitario" name="bCentroUniversitario" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCarrera2'];
					echo '<input style="display: none;" id="bCarrera2" name="bCarrera2" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bFechaGraduacion2'];
					echo '<input style="display: none;" id="bFechaGraduacion2" name="bFechaGraduacion2" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCentroUniversitario2'];
					echo '<input style="display: none;" id="bCentroUniversitario2" name="bCentroUniversitario2" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCarrera3'];
					echo '<input style="display: none;" id="bCarrera3" name="bCarrera3" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bFechaGraduacion3'];
					echo '<input style="display: none;" id="bFechaGraduacion3" name="bFechaGraduacion3" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCentroUniversitario3'];
					echo '<input style="display: none;" id="bCentroUniversitario3" name="bCentroUniversitario3" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCarrera4'];
					echo '<input style="display: none;" id="bCarrera4" name="bCarrera4" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bFechaGraduacion4'];
					echo '<input style="display: none;" id="bFechaGraduacion4" name="bFechaGraduacion4" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCentroUniversitario4'];
					echo '<input style="display: none;" id="bCentroUniversitario4" name="bCentroUniversitario4" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCarrera5'];
					echo '<input style="display: none;" id="bCarrera5" name="bCarrera5" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bFechaGraduacion5'];
					echo '<input style="display: none;" id="bFechaGraduacion5" name="bFechaGraduacion5" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCentroUniversitario5'];
					echo '<input style="display: none;" id="bCentroUniversitario5" name="bCentroUniversitario5" type="text" value="'.$NombreTemporal.'">';
					$NombreTemporal = $_SESSION['bCodigoEscolar'];
					echo '<input style="display: none;" id="bCodigoEscolar" name="bCodigoEscolar" type="text" value="'.$NombreTemporal.'">';
				?>
                <?php		
                    $_SESSION['bGlobal'] = 	$_SESSION['bCentroUniversitario'] + $_SESSION['bFechaGraduacion'] + $_SESSION['bCarrera'] +                     $_SESSION['bCentroUniversitario2'] + $_SESSION['bFechaGraduacion2'] + $_SESSION['bCarrera2'] +                     $_SESSION['bCentroUniversitario3'] + $_SESSION['bFechaGraduacion3'] + $_SESSION['bCarrera3'] +                     $_SESSION['bCentroUniversitario4'] + $_SESSION['bFechaGraduacion4'] + $_SESSION['bCarrera4'] +                     $_SESSION['bCentroUniversitario5'] + $_SESSION['bFechaGraduacion5'] + $_SESSION['bCarrera5'] +                     $_SESSION['bNombreCompleto'] ;
                    $_SESSION['bSinRevision'] = 'NO';
                    $NombreTemporal = $_SESSION['NombreCompleto'];
                    echo '<label  style="position: absolute; top: 120px; left: 30px;" id="LabelNombre">Estudiante :</label>';
                    echo '<input  style="position: absolute; top: 118px; left: 130px; width:240px;" id="NombreCompleto" name="NombreCompleto" type="text" required onkeyup="mayus(this)" value="'.$NombreTemporal.'">';
                    echo '<input id="NombreCompletoAnterior" name="NombreCompletoAnterior" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['Carrera'];
                ?> 
                <label  style="position: absolute; top: 154px; left: 30px;" id="LabelCarrera">Carrera :</label>				
				<select name="Carrera" id="Carrera" required style="position: absolute; top: 148px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
				<option value="" disabled selected>Seleccione</option>
					<?php 
            			include 'conexion.php';
            			$alta = "SELECT TipoCarrera FROM DBUDEG.dbo.Carreras ORDER BY TipoCarrera";
            			$fila = sqlsrv_query($conn,$alta);
           				while( $valor =  sqlsrv_fetch_array($fila)){
           				if ($_SESSION['Carrera'] == $valor['TipoCarrera'] ) {
           			?>
					<option value="<?php echo $_SESSION['Carrera']; ?>" selected>
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }else{?>
					<option value="<?php echo $valor['TipoCarrera']?>">
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }?>
						<?php
          					}
            			?>
				</select><br>
                <?php
                    echo '<input id="CarreraAnterior" name="CarreraAnterior" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['FechaGraduacion'];
                    echo '<label  style="position: absolute; top: 184px; left: 30px;" id="LabelFechaGraduacion">Fecha Titulación :</label>';
                    echo '<input  id="FechaGraduacion" name="FechaGraduacion" required type="text" placeholder="dd/mm/aaaa" style="position: absolute; top: 182px; left: 130px; width:240px;" onkeyup="mayus(this)" value="'.$NombreTemporal.'">';
                    echo '<input id="FechaGraduacionAnterior" name="FechaGraduacionAnterior" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['CentroUniversitario'];
                ?>                    
                <label  style="position: absolute; top: 216px; left: 30px;" id="LabelCentroUniversitario">Universidad :</label>	
                <select name="CentroUniversitario" id="CentroUniversitario" required style="position: absolute; top: 212px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
                    <option value="" disabled selected>Seleccione</option>
                    <?php 
                        include 'conexion.php';
                        $alta = "SELECT TipoCentro FROM DBUDEG.dbo.CentroUniversitario ORDER BY TipoCentro";
                        $fila = sqlsrv_query($conn,$alta);
                            while( $valor =  sqlsrv_fetch_array($fila)){
                            if ($_SESSION['CentroUniversitario'] == $valor['TipoCentro'] ) {
                        ?>
                    <option value="<?php echo $_SESSION['CentroUniversitario']; ?>" selected>
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }else{?>
                    <option value="<?php echo $valor['TipoCentro']?>">
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }?>
                        <?php
                                }
                        ?>
                </select><br>
                <input id="CentroUniversitarioAnterior" name="CentroUniversitarioAnterior" type="text" style="display: none;" readonly value="<?php echo $NombreTemporal; ?>">
                <?php		
                    $NombreTemporal = $_SESSION['Carrera2'];
                ?> 
                <label  style="position: absolute; top: 300px; left: 30px;" id="LabelCarrera2">Carrera 2 :</label>				
				<select name="Carrera2" id="Carrera2" style="position: absolute; top: 298px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
				<option value="" selected>Seleccione</option>
					<?php 
            			include 'conexion.php';
            			$alta = "SELECT TipoCarrera FROM DBUDEG.dbo.Carreras ORDER BY TipoCarrera";
            			$fila = sqlsrv_query($conn,$alta);
           				while( $valor =  sqlsrv_fetch_array($fila)){
           				if ($_SESSION['Carrera2'] == $valor['TipoCarrera'] ) {
           			?>
					<option value="<?php echo $_SESSION['Carrera2']; ?>" selected>
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }else{?>
					<option value="<?php echo $valor['TipoCarrera']?>">
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }?>
						<?php
          					}
            			?>
				</select><br>
                <?php
                    echo '<input id="CarreraAnterior2" name="CarreraAnterior2" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['FechaGraduacion2'];
                    echo '<label  style="position: absolute; top: 332px; left: 30px;" id="LabelFechaGraduacion2">Fecha Titulación 2: </label>';
                    echo '<input  style="position: absolute; top: 330px; left: 130px; width:240px;" id="FechaGraduacion2" name="FechaGraduacion2" type="text" placeholder="dd/mm/aaaa" onkeyup="mayus(this)" value="'.$NombreTemporal.'">';
                    echo '<input id="FechaGraduacionAnterior2" name="FechaGraduacionAnterior2" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['CentroUniversitario2'];
                ?>                    
                <label  style="position: absolute; top: 362px; left: 30px;" id="LabelCentroUniversitario2">Universidad 2 :</label>	
                <select name="CentroUniversitario2" id="CentroUniversitario2" style="position: absolute; top: 360px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
                    <option value="" selected>Seleccione</option>
                    <?php 
                        include 'conexion.php';
                        $alta = "SELECT TipoCentro FROM DBUDEG.dbo.CentroUniversitario ORDER BY TipoCentro";
                        $fila = sqlsrv_query($conn,$alta);
                            while( $valor =  sqlsrv_fetch_array($fila)){
                            if ($_SESSION['CentroUniversitario2'] == $valor['TipoCentro'] ) {
                        ?>
                    <option value="<?php echo $_SESSION['CentroUniversitario2']; ?>" selected>
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }else{?>
                    <option value="<?php echo $valor['TipoCentro']?>">
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }?>
                        <?php
                                }
                        ?>
                </select><br>
                <input id="CentroUniversitarioAnterior2" name="CentroUniversitarioAnterior2" type="text" style="display: none;" readonly value="<?php echo $NombreTemporal; ?>">

                <?php		
                    $NombreTemporal = $_SESSION['Carrera3'];
                ?> 
                <label  style="position: absolute; top: 396px; left: 30px;" id="LabelCarrera3">Carrera 3:</label>				
				<select name="Carrera3" id="Carrera3" style="position: absolute; top: 394px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
				<option value="" selected>Seleccione</option>
					<?php 
            			include 'conexion.php';
            			$alta = "SELECT TipoCarrera FROM DBUDEG.dbo.Carreras ORDER BY TipoCarrera";
            			$fila = sqlsrv_query($conn,$alta);
           				while( $valor =  sqlsrv_fetch_array($fila)){
           				if ($_SESSION['Carrera3'] == $valor['TipoCarrera'] ) {
           			?>
					<option value="<?php echo $_SESSION['Carrera3']; ?>" selected>
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }else{?>
					<option value="<?php echo $valor['TipoCarrera']?>">
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }?>
						<?php
          					}
            			?>
				</select><br>
                <?php
                    echo '<input id="CarreraAnterior3" name="CarreraAnterior3" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['FechaGraduacion3'];
                    echo '<label  style="position: absolute; top: 426px; left: 30px;" id="LabelFechaGraduacion3">Fecha Titulación 3:</label>';
                    echo '<input  style="position: absolute; top: 424px; left: 130px; width:240px;" id="FechaGraduacion3" name="FechaGraduacion3" type="text" placeholder="dd/mm/aaaa" onkeyup="mayus(this)" value="'.$NombreTemporal.'">';
                    echo '<input id="FechaGraduacionAnterior3" name="FechaGraduacionAnterior3" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['CentroUniversitario3'];
                ?>                    
                <label  style="position: absolute; top: 458px; left: 30px;" id="LabelCentroUniversitario3">Universidad 3:</label>	
                <select name="CentroUniversitario3" id="CentroUniversitario3" style="position: absolute; top: 456px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
                    <option value="" selected>Seleccione</option>
                    <?php 
                        include 'conexion.php';
                        $alta = "SELECT TipoCentro FROM DBUDEG.dbo.CentroUniversitario ORDER BY TipoCentro";
                        $fila = sqlsrv_query($conn,$alta);
                            while( $valor =  sqlsrv_fetch_array($fila)){
                            if ($_SESSION['CentroUniversitario3'] == $valor['TipoCentro'] ) {
                        ?>
                    <option value="<?php echo $_SESSION['CentroUniversitario3']; ?>" selected>
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }else{?>
                    <option value="<?php echo $valor['TipoCentro']?>">
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }?>
                        <?php
                                }
                        ?>
                </select><br>
                <input id="CentroUniversitarioAnterior3" name="CentroUniversitarioAnterior3" type="text" style="display: none;" readonly value=<?php echo $NombreTemporal; ?>>

                <?php		
                    $NombreTemporal = $_SESSION['Carrera4'];
                ?> 
                <label  style="position: absolute; top: 492px; left: 30px;" id="LabelCarrera4">Carrera 4:</label>				
				<select name="Carrera4" id="Carrera4" style="position: absolute; top: 490px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
				<option value="" selected>Seleccione</option>
					<?php 
            			include 'conexion.php';
            			$alta = "SELECT TipoCarrera FROM DBUDEG.dbo.Carreras ORDER BY TipoCarrera";
            			$fila = sqlsrv_query($conn,$alta);
           				while( $valor =  sqlsrv_fetch_array($fila)){
           				if ($_SESSION['Carrera4'] == $valor['TipoCarrera'] ) {
           			?>
					<option value="<?php echo $_SESSION['Carrera4']; ?>" selected>
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }else{?>
					<option value="<?php echo $valor['TipoCarrera']?>">
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }?>
						<?php
          					}
            			?>
				</select><br>
                <?php
                    echo '<input id="CarreraAnterior4" name="CarreraAnterior4" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['FechaGraduacion4'];
                    echo '<label  style="position: absolute; top: 522px; left: 30px;" id="LabelFechaGraduacion4">Fecha Titulación 4:</label>';
                    echo '<input  style="position: absolute; top: 520px; left: 130px; width:240px;" id="FechaGraduacion4" name="FechaGraduacion4" type="text" placeholder="dd/mm/aaaa" onkeyup="mayus(this)" value="'.$NombreTemporal.'">';
                    echo '<input id="FechaGraduacionAnterior4" name="FechaGraduacionAnterior4" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['CentroUniversitario4'];
                ?>                    
                <label  style="position: absolute; top: 554px; left: 30px;" id="LabelCentroUniversitario4">Universidad 4:</label>	
                <select name="CentroUniversitario4" id="CentroUniversitario4" style="position: absolute; top: 552px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
                    <option value="" selected>Seleccione</option>
                    <?php 
                        include 'conexion.php';
                        $alta = "SELECT TipoCentro FROM DBUDEG.dbo.CentroUniversitario ORDER BY TipoCentro";
                        $fila = sqlsrv_query($conn,$alta);
                            while( $valor =  sqlsrv_fetch_array($fila)){
                            if ($_SESSION['CentroUniversitario4'] == $valor['TipoCentro'] ) {
                        ?>
                    <option value="<?php echo $_SESSION['CentroUniversitario4']; ?>" selected>
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }else{?>
                    <option value="<?php echo $valor['TipoCentro']?>">
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }?>
                        <?php
                                }
                        ?>
                </select><br>
                <input id="CentroUniversitarioAnterior4" name="CentroUniversitarioAnterior4" type="text" style="display: none;" readonly value=<?php echo $NombreTemporal; ?>>

                <?php		
                    $NombreTemporal = $_SESSION['Carrera5'];
                ?> 
                <label  style="position: absolute; top: 586px; left: 30px;" id="LabelCarrera4">Carrera 5:</label>				
				<select name="Carrera5" id="Carrera5" style="position: absolute; top: 584px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
				<option value="" selected>Seleccione</option>
					<?php 
            			include 'conexion.php';
            			$alta = "SELECT TipoCarrera FROM DBUDEG.dbo.Carreras ORDER BY TipoCarrera";
            			$fila = sqlsrv_query($conn,$alta);
           				while( $valor =  sqlsrv_fetch_array($fila)){
           				if ($_SESSION['Carrera5'] == $valor['TipoCarrera'] ) {
           			?>
					<option value="<?php echo $_SESSION['Carrera5']; ?>" selected>
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }else{?>
					<option value="<?php echo $valor['TipoCarrera']?>">
						<?php echo $valor['TipoCarrera'];?>
					</option>
						<?php }?>
						<?php
          					}
            			?>
				</select><br>
                <?php
                    echo '<input id="CarreraAnterior5" name="CarreraAnterior5" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['FechaGraduacion5'];
                    echo '<label  style="position: absolute; top: 618px; left: 30px;" id="LabelFechaGraduacion4">Fecha Titulación 5:</label>';
                    echo '<input  style="position: absolute; top: 616px; left: 130px; width:240px;" id="FechaGraduacion5" name="FechaGraduacion5" type="text" placeholder="dd/mm/aaaa" onkeyup="mayus(this)" value="'.$NombreTemporal.'">';
                    echo '<input id="FechaGraduacionAnterior5" name="FechaGraduacionAnterior5" type="text" style="display: none;" readonly value="'.$NombreTemporal.'">';
                    $NombreTemporal = $_SESSION['CentroUniversitario5'];
                ?>                    
                <label  style="position: absolute; top: 650px; left: 30px;" id="LabelCentroUniversitario4">Universidad 5:</label>	
                <select name="CentroUniversitario5" id="CentroUniversitario5" style="position: absolute; top: 648px; left: 130px; width:240px;  max-width: 100%; font-size: 10px;">
                    <option value="" selected>Seleccione</option>
                    <?php 
                        include 'conexion.php';
                        $alta = "SELECT TipoCentro FROM DBUDEG.dbo.CentroUniversitario ORDER BY TipoCentro";
                        $fila = sqlsrv_query($conn,$alta);
                            while( $valor =  sqlsrv_fetch_array($fila)){
                            if ($_SESSION['CentroUniversitario5'] == $valor['TipoCentro'] ) {
                        ?>
                    <option value="<?php echo $_SESSION['CentroUniversitario5']; ?>" selected>
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }else{?>
                    <option value="<?php echo $valor['TipoCentro']?>">
                        <?php echo $valor['TipoCentro'];?>
                    </option>
                        <?php }?>
                        <?php
                                }
                        ?>
                </select><br>
                <input id="CentroUniversitarioAnterior5" name="CentroUniversitarioAnterior5" type="text" style="display: none;" readonly value=<?php echo $NombreTemporal; ?>>



                    <label  style="color : red !important; position: absolute; top: 250px; left: 190px; font-size: 18px;"   id="LabelOpcional">OPCIONAL</label>

                    <input style="position: absolute; top: 58px; left: 880px;" type="checkbox" id="ImagenRotada" <?php echo $ImagenesRotadas; ?> name="ImagenRotada">
                    <strong><label style="position: absolute; top: 61px; left: 900px;" id="LabelImagenRotada">IMAGENES VOLTEADAS</label></strong>

                    <input style="position: absolute; top: 58px; left: 1030px;"type="checkbox" id="HojasBlancas" <?php echo $ImagenesBlancas; ?> name="HojasBlancas">
                    <strong><label style="position: absolute; top: 61px; left: 1050px;" id="LabelHojasBlancas">HOJAS BLANCAS</label></strong>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

        function Verificadatos() {
            radio1 = document.getElementById("radio1");
            radio2 = document.getElementById("radio2");
            correctoCodigoEscolar = document.getElementById('CodigoEscolarCorrecto');
            if (radio1.checked) {
                document.form_01.Proc.disabled = false;
                correctoCodigoEscolar.style.display = 'none';
                document.form_01.CodigoEscolarCorregido.value = null;
            } else if (radio2.checked) {
                correctoCodigoEscolar.style.display = 'block';
                if (document.form_01.CodigoEscolarCorregido.value.length == 0) {
                    document.form_01.Proc.disabled = true;
                    alert("Debes de Validar el Codigo Escolar del Expediente");
                    document.form_01.CodigoEscolarCorregido.focus();
                    return false;
                }
                document.form_01.Proc.disabled = false;
                return true
            } else {
                alert("No has Validado el Codigo Escolar.");
                return false;
            }
            if ((document.form_01.Carrera2.value.length == 0) && (document.form_01.FechaGraduacion2.value.length == 0) && (document.form_01.CentroUniversitario2.value.length == 0)) {                   
            } else {
                if (document.form_01.Carrera2.value.length == 0) 
                { 
                    alert("Debes de Introducir la carrera 2");
                    document.form_01.Carrera2.focus();
                    return false;
                }            
                if (document.form_01.FechaGraduacion2.value.length == 0)
                { 
                    alert("Debes de Introducir la Fecha de Titulacion 2");
                    document.form_01.FechaGraduacion2.focus();
                    return false;
                }            
                if (document.form_01.CentroUniversitario2.value.length == 0)
                { 
                    alert("Debes de Introducir la Universidad 2");
                    document.form_01.CentroUniversitario2.focus();
                    return false;
                }                           
            }
        }

        function ValidaDatosSalida() {
            radio1 = document.getElementById("radio1");
            radio2 = document.getElementById("radio2");
			cbErrorPdf = document.getElementById("ErrorPdf");
			if (document.form_01.CodigoEscolarCorregido.value.length > 5) {
				if (document.form_01.CodigoEscolar.value == document.form_01.CodigoEscolarCorregido.value ) {
						alert("No se puede enviar. Los Codigos Escolar coinciden");
						return false;
				}
			}
            if (document.form_01.codbarra.value.length.trim == 0) {
                alert("Debes de Obtener un Expediente para Continuar");
                return false;
            }
            if (cbErrorPdf.checked) {
                let confirmacion = confirm('¿Estás seguro que esta Dañado el expediente?, No contara como pago.');
                if (confirmacion) {
                    return true;
                } else {
                    return false;
                }
            } else {
                if ((radio1.checked) || (radio2.checked)) {
                    if (radio1.checked) {
                        if (document.form_01.CodigoEscolar.value.length == 0) {
                            alert("Debes de traer un Codigo Escolar para continuar");
                            return false;
                        }
                    }
                    if (radio2.checked) {
                        if (document.form_01.CodigoEscolarCorregido.value.length == 0) {
                            alert("Debes de capturar un Codigo Escolar para continuar");
                            return false;
                        }
                    }
                } else {
                    alert("No has Validado el Codigo Escolar.");
                    return false;
                }
            }
            if ((document.form_01.Carrera2.value.length == 0) && (document.form_01.FechaGraduacion2.value.length == 0) && (document.form_01.CentroUniversitario2.value.length == 0)) {                   
            } else {
                if (document.form_01.Carrera2.value.length == 0) 
                { 
                    alert("Debes de Introducir la carrera 2");
                    document.form_01.Carrera2.focus();
                    return false;
                }            
                if (document.form_01.FechaGraduacion2.value.length == 0)
                { 
                    alert("Debes de Introducir la Fecha de Titulacion 2");
                    document.form_01.FechaGraduacion2.focus();
                    return false;
                }            
                if (document.form_01.CentroUniversitario2.value.length == 0)
                { 
                    alert("Debes de Introducir la Universidad 2");
                    document.form_01.CentroUniversitario2.focus();
                    return false;
                }                           
            }
            if ((document.form_01.Carrera3.value.length == 0) && (document.form_01.FechaGraduacion3.value.length == 0) && (document.form_01.CentroUniversitario3.value.length == 0)) {                   
            } else {
                if (document.form_01.Carrera3.value.length == 0) 
                { 
                    alert("Debes de Introducir la carrera 3");
                    document.form_01.Carrera3.focus();
                    return false;
                }            
                if (document.form_01.FechaGraduacion3.value.length == 0)
                { 
                    alert("Debes de Introducir la Fecha de Titulacion 3");
                    document.form_01.FechaGraduacion3.focus();
                    return false;
                }            
                if (document.form_01.CentroUniversitario3.value.length == 0)
                { 
                    alert("Debes de Introducir la Universidad 3");
                    document.form_01.CentroUniversitario3.focus();
                    return false;
                }                           
            }
            if ((document.form_01.Carrera4.value.length == 0) && (document.form_01.FechaGraduacion4.value.length == 0) && (document.form_01.CentroUniversitario4.value.length == 0)) {                   
            } else {
                if (document.form_01.Carrera4.value.length == 0) 
                { 
                    alert("Debes de Introducir la carrera 4");
                    document.form_01.Carrera4.focus();
                    return false;
                }            
                if (document.form_01.FechaGraduacion4.value.length == 0)
                { 
                    alert("Debes de Introducir la Fecha de Titulacion 4");
                    document.form_01.FechaGraduacion4.focus();
                    return false;
                }            
                if (document.form_01.CentroUniversitario4.value.length == 0)
                { 
                    alert("Debes de Introducir la Universidad 4");
                    document.form_01.CentroUniversitario4.focus();
                    return false;
                }                           
            }
            if ((document.form_01.Carrera5.value.length == 0) && (document.form_01.FechaGraduacion5.value.length == 0) && (document.form_01.CentroUniversitario5.value.length == 0)) {                   
            } else {
                if (document.form_01.Carrera5.value.length == 0) 
                { 
                    alert("Debes de Introducir la carrera 5");
                    document.form_01.Carrera5.focus();
                    return false;
                }            
                if (document.form_01.FechaGraduacion5.value.length == 0)
                { 
                    alert("Debes de Introducir la Fecha de Titulacion 5");
                    document.form_01.FechaGraduacion5.focus();
                    return false;
                }            
                if (document.form_01.CentroUniversitario5.value.length == 0)
                { 
                    alert("Debes de Introducir la Universidad 5");
                    document.form_01.CentroUniversitario5.focus();
                    return false;
                }                           
            }
            if (document.form_01.Carrera2.value.length > 0)
            {
                if (document.form_01.Carrera.value == document.form_01.Carrera2.value)
                {
                    alert("La Carrera 1 y La carrera 2 No pueden ser iguales");
                    document.form_01.Carrera2.focus();
                    return false;
                }   
                if (document.form_01.Carrera3.value.length > 0) 
                {
                    if (document.form_01.Carrera.value == document.form_01.Carrera3.value)
                    {
                        alert("La Carrera 1 y La carrera 3 No pueden ser iguales");
                        document.form_01.Carrera3.focus();
                        return false;
                    }   
                    if (document.form_01.Carrera2.value == document.form_01.Carrera3.value)
                    {
                        alert("La Carrera 2 y La carrera 3 No pueden ser iguales");
                        document.form_01.Carrera3.focus();
                        return false;
                    }   
                }
                if (document.form_01.Carrera4.value.length > 0) 
                { 
                    if (document.form_01.Carrera.value == document.form_01.Carrera4.value)
                    {
                        alert("La Carrera 1 y La carrera 4 No pueden ser iguales");
                        document.form_01.Carrera4.focus();
                        return false;
                    }   
                    if (document.form_01.Carrera2.value == document.form_01.Carrera4.value)
                    {
                        alert("La Carrera 2 y La carrera 4 No pueden ser iguales");
                        document.form_01.Carrera4.focus();
                        return false;
                    }                    
                }
                if (document.form_01.Carrera5.value.length > 0) 
                { 
                    if (document.form_01.Carrera.value == document.form_01.Carrera5.value)
                    {
                        alert("La Carrera 1 y La carrera 5 No pueden ser iguales");
                        document.form_01.Carrera5.focus();
                        return false;
                    }   
                    if (document.form_01.Carrera2.value == document.form_01.Carrera5.value)
                    {
                        alert("La Carrera 2 y La carrera 5 No pueden ser iguales");
                        document.form_01.Carrera5.focus();
                        return false;
                    }   
                }
            }      
            if (document.form_01.Carrera3.value.length > 0)
            {
                if (document.form_01.Carrera.value == document.form_01.Carrera3.value)
                {
                    alert("La Carrera 1 y La carrera 3 No pueden ser iguales");
                    document.form_01.Carrera3.focus();
                    return false;
                }   
                if (document.form_01.Carrera4.value.length > 0) 
                { 
                    if (document.form_01.Carrera.value == document.form_01.Carrera4.value)
                    {
                        alert("La Carrera 1 y La carrera 4 No pueden ser iguales");
                        document.form_01.Carrera4.focus();
                        return false;
                    }   
                    if (document.form_01.Carrera3.value == document.form_01.Carrera4.value)
                    {
                        alert("La Carrera 3 y La carrera 4 No pueden ser iguales");
                        document.form_01.Carrera4.focus();
                        return false;
                    }                    
                }
                if (document.form_01.Carrera5.value.length > 0) 
                { 
                    if (document.form_01.Carrera.value == document.form_01.Carrera5.value)
                    {
                        alert("La Carrera 1 y La carrera 5 No pueden ser iguales");
                        document.form_01.Carrera5.focus();
                        return false;
                    }   
                    if (document.form_01.Carrera3.value == document.form_01.Carrera5.value)
                    {
                        alert("La Carrera 3 y La carrera 5 No pueden ser iguales");
                        document.form_01.Carrera5.focus();
                        return false;
                    }   
                }
            }          
            if (document.form_01.Carrera4.value.length > 0)
            {
                if (document.form_01.Carrera.value == document.form_01.Carrera4.value)
                {
                    alert("La Carrera 1 y La carrera 4 No pueden ser iguales");
                    document.form_01.Carrera4.focus();
                    return false;
                }   
                if (document.form_01.Carrera5.value.length > 0) 
                { 
                    if (document.form_01.Carrera.value == document.form_01.Carrera5.value)
                    {
                        alert("La Carrera 1 y La carrera 5 No pueden ser iguales");
                        document.form_01.Carrera5.focus();
                        return false;
                    }   
                    if (document.form_01.Carrera4.value == document.form_01.Carrera5.value)
                    {
                        alert("La Carrera 4 y La carrera 5 No pueden ser iguales");
                        document.form_01.Carrera5.focus();
                        return false;
                    }   
                }
            }          
            if (document.form_01.Carrera5.value.length > 0)
            {
                if (document.form_01.Carrera.value == document.form_01.Carrera5.value)
                {
                    alert("La Carrera 1 y La carrera 5 No pueden ser iguales");
                    document.form_01.Carrera5.focus();
                    return false;
                }   
            }          
            return true;
        }
    </script>
   
    <script type="text/javascript">
        $("input[name='CodigoEscolarCorregido']").keyup(function (e) {
            if (e.which == 27) {
                $.post('buscarCodigoEscolar.php', {
                    ID: $("input[name='CodigoEscolarCorregido']").val()
                }, function (data) {
                    $('#datos_buscador').html(data);
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        flatpickr("#FechaGraduacion", {
        dateFormat: "d/m/Y", // Formato: día/mes/año
        allowInput: true,    // Permite escribir manualmente
        locale: "es"         // Traducción al español
        });
    </script>
    <script>
        flatpickr("#FechaGraduacion2", {
        dateFormat: "d/m/Y", // Formato: día/mes/año
        allowInput: true,    // Permite escribir manualmente
        locale: "es"         // Traducción al español
        });
    </script>
    <script>
        flatpickr("#FechaGraduacion3", {
        dateFormat: "d/m/Y", // Formato: día/mes/año
        allowInput: true,    // Permite escribir manualmente
        locale: "es"         // Traducción al español
        });
    </script>
    <script>
        flatpickr("#FechaGraduacion4", {
        dateFormat: "d/m/Y", // Formato: día/mes/año
        allowInput: true,    // Permite escribir manualmente
        locale: "es"         // Traducción al español
        });
    </script>
    <script>
        flatpickr("#FechaGraduacion5", {
        dateFormat: "d/m/Y", // Formato: día/mes/año
        allowInput: true,    // Permite escribir manualmente
        locale: "es"         // Traducción al español
        });
    </script>
    <div>
        <embed id="ImagenPdf" src="<?php echo $Mostrar; ?>" type="application/pdf" height="850px" width="800px"
            aling="right" style="width: 65%; float:right;">
    </div>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>
</body>

</html>