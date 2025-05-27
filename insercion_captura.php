<?php 
	session_start();
	include 'conexion.php';
	$CodigoBarras = $_POST['codbarra'];
	$Secuencia = $_POST['secuenciadoc'];
	$Pdf = $_POST['pdfname'];
	//$HoraInicial = $_POST['h_inicial'];
	$bNombreCompleto = $_POST['bNombreCompleto'];
	$bCarrera = $_POST['bCarrera'];
	$bFechaGraduacion = $_POST['bFechaGraduacion'];
	$bCentroUniversitario = $_POST['bCentroUniversitario'];
	$bCarrera2 = $_POST['bCarrera2'];
	$bFechaGraduacion2 = $_POST['bFechaGraduacion2'];
	$bCentroUniversitario2 = $_POST['bCentroUniversitario2'];
	$bCarrera3 = $_POST['bCarrera3'];
	$bFechaGraduacion3 = $_POST['bFechaGraduacion3'];
	$bCentroUniversitario3 = $_POST['bCentroUniversitario3'];
	$bCarrera4 = $_POST['bCarrera4'];
	$bFechaGraduacion4 = $_POST['bFechaGraduacion4'];
	$bCentroUniversitario4 = $_POST['bCentroUniversitario4'];
	$bCarrera5 = $_POST['bCarrera5'];
	$bFechaGraduacion5 = $_POST['bFechaGraduacion5'];
	$bCentroUniversitario5 = $_POST['bCentroUniversitario5'];
	$bSinRevision = $_SESSION['bSinRevision'];
	$ConComprobante = null;
    $totalExpedientes = 0;
    $totalExpedientes1 = 1;
    $totalExpedientes2 = 0;
    $totalExpedientes3 = 0;
    $totalExpedientes4 = 0;
    $totalExpedientes5 = 0;
	if(isset($_POST['GrabarDuda']))
    {
		$GrabarDuda = $_POST['GrabarDuda'];
	} else 
    {
		$GrabarDuda ="";		
	}
	if(isset($_POST['CodigoEscolar'])){
		$CodigoEscolar = $_POST['CodigoEscolar'];
	} else {
		$CodigoEscolar ='';		
	}
	if(isset($_POST['NombreCompleto'])){
		$NombreCompleto = $_POST['NombreCompleto'];
		if (strlen(trim($NombreCompleto))> 1) {
			if ($bNombreCompleto == 1){
				$bNombreCompleto = 2;
			}			
		}
	} else {
		$NombreCompleto ='';		
	}
	if(isset($_POST['NombreCompletoAnterior'])){
		$NombreCompletoAnterior = $_POST['NombreCompletoAnterior'];
	} else {
		$NombreCompletoAnterior ='';		
	}
	if(isset($_POST['comenexp'])){
		$Comentarios = $_POST['comenexp'];
	} else {
		$Comentarios ='';		
	}
	if(isset($_POST['Carrera'])){
		$Carrera = $_POST['Carrera'];
		if (strlen(trim($Carrera))> 1) {
			if ($bCarrera == 1){
				$bCarrera = 2;
			}			
		}
	} else {
		$Carrera ='';		
	}
	if(isset($_POST['CarreraAnterior'])){
		$CarreraAnterior = $_POST['CarreraAnterior'];
	} else {
		$CarreraAnterior ='';		
	}
	if(isset($_POST['FechaGraduacion'])){
		$FechaGraduacion = $_POST['FechaGraduacion'];
		if (strlen(trim($FechaGraduacion))> 1) {
			if ($bFechaGraduacion == 1){
				$bFechaGraduacion = 2;
			}			
		}
	} else {
		$FechaGraduacion ='';		
	}
	if(isset($_POST['FechaGraduacionAnterior'])){
		$FechaGraduacionAnterior = $_POST['FechaGraduacionAnterior'];
	} else {
		$FechaGraduacionAnterior ='';		
	}
	if(isset($_POST['CentroUniversitario'])){
		$CentroUniversitario = $_POST['CentroUniversitario'];
		if (strlen(trim($CentroUniversitario))> 1) {
			if ($bCentroUniversitario == 1){
				$bCentroUniversitario = 2;
			}			
		}
	} else {
		$CentroUniversitario ='';		
	}
	if(isset($_POST['CentroUniversitarioAnterior'])){
		$CentroUniversitarioAnterior = $_POST['CentroUniversitarioAnterior'];
	} else {
		$CentroUniversitarioAnterior ='';		
	}
    /*echo'<script type="text/javascript">
    alert("CentroUniversitario ['.$CentroUniversitario.']");
    </script>';
    echo'<script type="text/javascript">
    alert("CentroUniversitarioAnterior ['.$CentroUniversitarioAnterior.']");
    </script>';*/
	if(isset($_POST['Carrera2'])){
		$Carrera2 = $_POST['Carrera2'];
		if (strlen(trim($Carrera2))> 1) {
            $totalExpedientes2 = 1;
			if ($bCarrera2 == 1){
				$bCarrera2 = 2;
			}			
		}
	} else {
		$Carrera2 ='';		
	}
	if(isset($_POST['CarreraAnterior2'])){
		$CarreraAnterior2 = $_POST['CarreraAnterior2'];
	} else {
		$CarreraAnterior2 ='';		
	}
	if(isset($_POST['FechaGraduacion2'])){
		$FechaGraduacion2 = $_POST['FechaGraduacion2'];
		if (strlen(trim($FechaGraduacion2))> 1) {
			if ($bFechaGraduacion2 == 1){
				$bFechaGraduacion2 = 2;
			}			
		}
	} else {
		$FechaGraduacion2 ='';		
	}
	if(isset($_POST['FechaGraduacionAnterior2'])){
		$FechaGraduacionAnterior2 = $_POST['FechaGraduacionAnterior2'];
	} else {
		$FechaGraduacionAnterior2 ='';		
	}
	if(isset($_POST['CentroUniversitario2'])){
		$CentroUniversitario2 = $_POST['CentroUniversitario2'];
		if (strlen(trim($CentroUniversitario2))> 1) {
			if ($bCentroUniversitario2 == 1){
				$bCentroUniversitario2 = 2;
			}			
		}
	} else {
		$CentroUniversitario2 ='';		
	}
	if(isset($_POST['CentroUniversitarioAnterior2'])){
		$CentroUniversitarioAnterior2 = $_POST['CentroUniversitarioAnterior2'];
	} else {
		$CentroUniversitarioAnterior2 ='';		
	}

    if(isset($_POST['Carrera3'])){
		$Carrera3 = $_POST['Carrera3'];
		if (strlen(trim($Carrera3))> 1) {
            $totalExpedientes3 = 1;
			if ($bCarrera3 == 1){
				$bCarrera3 = 2;
			}			
		}
	} else {
		$Carrera3 ='';		
	}
	if(isset($_POST['CarreraAnterior3'])){
		$CarreraAnterior3 = $_POST['CarreraAnterior3'];
	} else {
		$CarreraAnterior3 ='';		
	}
	if(isset($_POST['FechaGraduacion3'])){
		$FechaGraduacion3 = $_POST['FechaGraduacion3'];
		if (strlen(trim($FechaGraduacion3))> 1) {
			if ($bFechaGraduacion3 == 1){
				$bFechaGraduacion3 = 2;
			}			
		}
	} else {
		$FechaGraduacion3 ='';		
	}
	if(isset($_POST['FechaGraduacionAnterior3'])){
		$FechaGraduacionAnterior3 = $_POST['FechaGraduacionAnterior3'];
	} else {
		$FechaGraduacionAnterior3 ='';		
	}
	if(isset($_POST['CentroUniversitario3'])){
		$CentroUniversitario3= $_POST['CentroUniversitario3'];
		if (strlen(trim($CentroUniversitario3))> 1) {
			if ($bCentroUniversitario3 == 1){
				$bCentroUniversitario3 = 2;
			}			
		}
	} else {
		$CentroUniversitario3 ='';		
	}
	if(isset($_POST['CentroUniversitarioAnterior3'])){
		$CentroUniversitarioAnterior3 = $_POST['CentroUniversitarioAnterior3'];
	} else {
		$CentroUniversitarioAnterior3 ='';		
	}

    if(isset($_POST['Carrera4'])){
		$Carrera4 = $_POST['Carrera4'];
		if (strlen(trim($Carrera4))> 1) {
            $totalExpedientes4 = 1;
			if ($bCarrera4 == 1){
				$bCarrera4 = 2;
			}			
		}
	} else {
		$Carrera4 ='';		
	}
	if(isset($_POST['CarreraAnterior4'])){
		$CarreraAnterior4 = $_POST['CarreraAnterior4'];
	} else {
		$CarreraAnterior4 ='';		
	}
	if(isset($_POST['FechaGraduacion4'])){
		$FechaGraduacion4 = $_POST['FechaGraduacion4'];
		if (strlen(trim($FechaGraduacion4))> 1) {
			if ($bFechaGraduacion4 == 1){
				$bFechaGraduacion4 = 2;
			}			
		}
	} else {
		$FechaGraduacion4 ='';		
	}
	if(isset($_POST['FechaGraduacionAnterior4'])){
		$FechaGraduacionAnterior4 = $_POST['FechaGraduacionAnterior4'];
	} else {
		$FechaGraduacionAnterior4 ='';		
	}
	if(isset($_POST['CentroUniversitario4'])){
		$CentroUniversitario4 = $_POST['CentroUniversitario4'];
		if (strlen(trim($CentroUniversitario4))> 1) {
			if ($bCentroUniversitario4 == 1){
				$bCentroUniversitario4 = 2;
			}			
		}
	} else {
		$CentroUniversitario4 ='';		
	}
	if(isset($_POST['CentroUniversitarioAnterior4'])){
		$CentroUniversitarioAnterior4 = $_POST['CentroUniversitarioAnterior4'];
	} else {
		$CentroUniversitarioAnterior4 ='';		
	}

    if(isset($_POST['Carrera5'])){
		$Carrera5 = $_POST['Carrera5'];
		if (strlen(trim($Carrera5))> 1) {
            $totalExpedientes5 = 1;
			if ($bCarrera5 == 1){
				$bCarrera5 = 2;
			}			
		}
	} else {
		$Carrera5 ='';		
	}
	if(isset($_POST['CarreraAnterior5'])){
		$CarreraAnterior5 = $_POST['CarreraAnterior5'];
	} else {
		$CarreraAnterior5 ='';		
	}
	if(isset($_POST['FechaGraduacion5'])){
		$FechaGraduacion5 = $_POST['FechaGraduacion5'];
		if (strlen(trim($FechaGraduacion5))> 1) {
			if ($bFechaGraduacion5 == 1){
				$bFechaGraduacion5 = 2;
			}			
		}
	} else {
		$FechaGraduacion5 ='';		
	}
	if(isset($_POST['FechaGraduacionAnterior5'])){
		$FechaGraduacionAnterior5 = $_POST['FechaGraduacionAnterior5'];
	} else {
		$FechaGraduacionAnterior5 ='';		
	}
	if(isset($_POST['CentroUniversitario5'])){
		$CentroUniversitario5 = $_POST['CentroUniversitario5'];
		if (strlen(trim($CentroUniversitario5))> 1) {
			if ($bCentroUniversitario5 == 1){
				$bCentroUniversitario5 = 2;
			}			
		}
	} else {
		$CentroUniversitario5 ='';		
	}
	if(isset($_POST['CentroUniversitarioAnterior5'])){
		$CentroUniversitarioAnterior5 = $_POST['CentroUniversitarioAnterior5'];
	} else {
		$CentroUniversitarioAnterior5 ='';		
	}

	$bCodigoEscolarCorregido = 0;	
	if(isset($_POST['CodigoEscolarCorregido'])){
		$CodigoEscolarCorregido = $_POST['CodigoEscolarCorregido'];
		if (strlen(trim($CodigoEscolarCorregido))> 1) {
			$bCodigoEscolarCorregido = 0.20;
		}
	} else {
		$CodigoEscolarCorregido ='';	
	}    
	if(isset($_POST['VariosExpedientes'])){
		$VariosExpedientes ='SI';
	} else {
		$VariosExpedientes ='NO';		
	}
	if(isset($_POST['ImagenRotada'])){
		$ImagenRotada ='SI';
	} else {
		$ImagenRotada ='NO';		
	}
	if(isset($_POST['HojasBlancas'])){
		$HojasBlancas ='SI';
	} else {
		$HojasBlancas ='NO';		
	}
	if(isset($_POST['cbCodigoEscolar'])){
		$cbCodigoEscolar ='SI';
	} else {
		$cbCodigoEscolar ='NO';		
	}
	if(isset($_POST['cbNombreCompleto'])){
		$cbNombreCompleto ='SI';
	} else {
		$cbNombreCompleto ='NO';		
	}
	if(isset($_POST['cbCarrera'])){
		$cbCarrera ='SI';
	} else {
		$cbCarrera ='NO';		
	}
	if(isset($_POST['cbFechaGraduacion'])){
		$cbFechaGraduacion ='SI';
	} else {
		$cbFechaGraduacion ='NO';		
	}
	if(isset($_POST['cbCentroUniversitario'])){
		$cbCentroUniversitario ='SI';
	} else {
		$cbCentroUniversitario ='NO';		
	}
	if(isset($_POST['cbCarrera2'])){
		$cbCarrera2 ='SI';
	} else {
		$cbCarrera2 ='NO';		
	}
	if(isset($_POST['cbFechaGraduacion2'])){
		$cbFechaGraduacion2 ='SI';
	} else {
		$cbFechaGraduacion2 ='NO';		
	}
	if(isset($_POST['cbCentroUniversitario2'])){
		$cbCentroUniversitario2 ='SI';
	} else {
		$cbCentroUniversitario2 ='NO';		
	}
	if(isset($_POST['cbCarrera3'])){
		$cbCarrera3='SI';
	} else {
		$cbCarrera3 ='NO';		
	}
	if(isset($_POST['cbFechaGraduacion3'])){
		$cbFechaGraduacion3 ='SI';
	} else {
		$cbFechaGraduacion3 ='NO';		
	}
	if(isset($_POST['cbCentroUniversitario3'])){
		$cbCentroUniversitario3 ='SI';
	} else {
		$cbCentroUniversitario33 ='NO';		
	}
	if(isset($_POST['cbCarrera4'])){
		$cbCarrera4 ='SI';
	} else {
		$cbCarrera4 ='NO';		
	}
	if(isset($_POST['cbFechaGraduacion4'])){
		$cbFechaGraduacion4 ='SI';
	} else {
		$cbFechaGraduacion4 ='NO';		
	}
	if(isset($_POST['cbCentroUniversitario4'])){
		$cbCentroUniversitario4 ='SI';
	} else {
		$cbCentroUniversitario4 ='NO';		
	}
	if(isset($_POST['cbCarrera5'])){
		$cbCarrera5 ='SI';
	} else {
		$cbCarrera5 ='NO';		
	}
	if(isset($_POST['cbFechaGraduacion5'])){
		$cbFechaGraduacion5 ='SI';
	} else {
		$cbFechaGraduacion5 ='NO';		
	}
	if(isset($_POST['cbCentroUniversitario5'])){
		$cbCentroUniversitario5 ='SI';
	} else {
		$cbCentroUniversitario5 ='NO';		
	}
	if(isset($_POST['ErrorPdf'])){
		$ErrorPdf ='SI';
	} else {
		$ErrorPdf ='NO';		
	}
     if ($NombreCompleto == $NombreCompletoAnterior) {
        $cbNombreCompleto = "NO";   
        $bNombreCompleto = 0 ; 
    } else {
        $cbNombreCompleto = "SI";  
        $bNombreCompleto = 0.20 ;  
    }
    if ($Carrera == $CarreraAnterior) {
        $cbCarrera = "NO";   
        $bCarrera = 0 ; 
    } else {
        $cbCarrera = "SI";  
        $bCarrera = 0.20 ;  
    }
    if ($FechaGraduacion == $FechaGraduacionAnterior) {
        $cbFechaGraduacion = "NO";   
        $bFechaGraduacion = 0 ; 
    } else {
        $cbFechaGraduacion = "SI";  
        $bFechaGraduacion = 0.20 ;  
    }
    if ($CentroUniversitario == $CentroUniversitarioAnterior) {
        $cbCentroUniversitario = "NO";   
        $bCentroUniversitario = 0 ; 
    } else {
        $cbCentroUniversitario = "SI";  
        $bCentroUniversitario = 0.20 ;  
    }
    if ($Carrera2 == $CarreraAnterior2) {
        $cbCarrera2 = "NO";   
        $bCarrera2 = 0 ; 
    } else {
        $cbCarrera2 = "SI";  
        $bCarrera2 = 0.20 ;  
    }
    if ($FechaGraduacion2 == $FechaGraduacionAnterior2) {
        $cbFechaGraduacion2 = "NO";   
        $bFechaGraduacion2 = 0 ; 
    } else {
        $cbFechaGraduacion2 = "SI";  
        $bFechaGraduacion2 = 0.20 ;  
    }
    if ($CentroUniversitario2 == $CentroUniversitarioAnterior2) {
        $cbCentroUniversitario2 = "NO";   
        $bCentroUniversitario2 = 0 ; 
    } else {
        $cbCentroUniversitario2 = "SI";  
        $bCentroUniversitario2 = 0.20 ;  
    }
    if ($Carrera3 == $CarreraAnterior3) {
        $cbCarrera3 = "NO";   
        $bCarrera3 = 0 ; 
    } else {
        $cbCarrera3 = "SI";  
        $bCarrera3 = 0.20 ;  
    }
    if ($FechaGraduacion3 == $FechaGraduacionAnterior3) {
        $cbFechaGraduacion3 = "NO";   
        $bFechaGraduacion3 = 0 ; 
    } else {
        $cbFechaGraduacion3 = "SI";  
        $bFechaGraduacion3 = 0.20 ;  
    }
    if ($CentroUniversitario3 == $CentroUniversitarioAnterior3) {
        $cbCentroUniversitario3 = "NO";   
        $bCentroUniversitario3 = 0 ; 
    } else {
        $cbCentroUniversitario3 = "SI";  
        $bCentroUniversitario3 = 0.20 ;  
    }
    if ($Carrera4 == $CarreraAnterior4) {
        $cbCarrera4 = "NO";   
        $bCarrera4 = 0 ; 
    } else {
        $cbCarrera4 = "SI";  
        $bCarrera4 = 0.20 ;  
    }
    if ($FechaGraduacion4 == $FechaGraduacionAnterior4) {
        $cbFechaGraduacion4 = "NO";   
        $bFechaGraduacion4 = 0 ; 
    } else {
        $cbFechaGraduacion4 = "SI";  
        $bFechaGraduacion4 = 0.20 ;  
    }
    if ($CentroUniversitario4 == $CentroUniversitarioAnterior4) {
        $cbCentroUniversitario4 = "NO";   
        $bCentroUniversitario4 = 0 ; 
    } else {
        $cbCentroUniversitario4 = "SI";  
        $bCentroUniversitario4 = 0.20 ;  
    }
    if ($Carrera5 == $CarreraAnterior5) {
        $cbCarrera5 = "NO";   
        $bCarrera5 = 0 ; 
    } else {
        $cbCarrera5 = "SI";  
        $bCarrera5 = 0.20 ;  
    }
    if ($FechaGraduacion5 == $FechaGraduacionAnterior5) {
        $cbFechaGraduacion5 = "NO";   
        $bFechaGraduacion5 = 0 ; 
    } else {
        $cbFechaGraduacion5 = "SI";  
        $bFechaGraduacion5 = 0.20 ;  
    }
    if ($CentroUniversitario5 == $CentroUniversitarioAnterior5) {
        $cbCentroUniversitario5 = "NO";   
        $bCentroUniversitario5 = 0 ; 
    } else {
        $cbCentroUniversitario5 = "SI";  
        $bCentroUniversitario5 = 0.20 ;  
    }

	$bCapturados = 0;
	$bGlobal = $bNombreCompleto + $bCarrera + $bFechaGraduacion + $bCentroUniversitario + $bCarrera2 + $bFechaGraduacion2 + $bCentroUniversitario2 + $bCarrera3 + $bFechaGraduacion3 + $bCentroUniversitario3 + $bCarrera4 + $bFechaGraduacion4 + $bCentroUniversitario4 + $bCarrera5 + $bFechaGraduacion5 + $bCentroUniversitario5 + $bCodigoEscolarCorregido;
    if (($bCarrera2 > 0) || ($bFechaGraduacion2 > 0) || ($bCentroUniversitario2 > 0) ){
        $totalExpedientes = $totalExpedientes +1;
    }
    if (($bCarrera3 > 0) || ($bFechaGraduacion3 > 0) || ($bCentroUniversitario3 > 0) ){
        $totalExpedientes = $totalExpedientes +1;
    }
    if (($bCarrera4 > 0) || ($bFechaGraduacion4 > 0) || ($bCentroUniversitario4 > 0) ){
        $totalExpedientes = $totalExpedientes +1;
    }
    if (($bCarrera5 > 0) || ($bFechaGraduacion5 > 0) || ($bCentroUniversitario5 > 0) ){
        $totalExpedientes = $totalExpedientes +1;
    }
    $totalExpedientes = $totalExpedientes1 + $totalExpedientes2 + $totalExpedientes3 + $totalExpedientes4 + $totalExpedientes5;
	if ($bNombreCompleto > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCarrera > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bFechaGraduacion > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCentroUniversitario > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCarrera2 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bFechaGraduacion2 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCentroUniversitario2 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCarrera3 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bFechaGraduacion3 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCentroUniversitario3 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCarrera4 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bFechaGraduacion4 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCentroUniversitario4 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCarrera5 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bFechaGraduacion5 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCentroUniversitario5 > 0) {
		$bCapturados = $bCapturados + 1;
	}
	if ($bCodigoEscolarCorregido > 0) {
		$bCapturados = $bCapturados + 1;
	}	
	if ($bSinRevision == 'SI') {
		$bGlobal = 1;
		$bNombreCompleto = 0;
		$bCarrera  = 0;
		$bFechaGraduacion  = 0;
		$bCentroUniversitario  = 0;
		$bCarrera2  = 0;
		$bFechaGraduacion2  = 0;
		$bCentroUniversitario2  = 0;
		$bCarrera3  = 0;
		$bFechaGraduacion3  = 0;
		$bCentroUniversitario3  = 0;
		$bCarrera4  = 0;
		$bFechaGraduacion4  = 0;
		$bCentroUniversitario4  = 0;
		$bCarrera5  = 0;
		$bFechaGraduacion5  = 0;
		$bCentroUniversitario5 = 0;
		$bCodigoEscolarCorregido  = 1; 
	}
	if ($ErrorPdf == 'SI'){
		$querieupdate = "UPDATE DBUDEG.dbo.Digitalizacion SET estatus = 2, Usuario = '$_SESSION[loginudeg]' WHERE NombrePdf = '$Pdf'";					
		if (SQLSRV_QUERY($conn,$querieupdate)) {
			if (isset($_SESSION['NombreCompleto'])) {
				unset($_SESSION['NombreCompleto']);
			}
			if (isset($_SESSION['Carrera'])) {
				unset($_SESSION['Carrera']);
			}
			if (isset($_SESSION['FechaGraduacion'])) {
				unset($_SESSION['FechaGraduacion']);
			}
			if (isset($_SESSION['CentroUniversitario'])) {
				unset($_SESSION['CentroUniversitario']);
			}
			if (isset($_SESSION['Carrera2'])) {
				unset($_SESSION['Carrera2']);
			}
			if (isset($_SESSION['FechaGraduacion2'])) {
				unset($_SESSION['FechaGraduacion2']);
			}
			if (isset($_SESSION['CentroUniversitario2'])) {
				unset($_SESSION['CentroUniversitario2']);
			}
			if (isset($_SESSION['Carrera3'])) {
				unset($_SESSION['Carrera3']);
			}
			if (isset($_SESSION['FechaGraduacion3'])) {
				unset($_SESSION['FechaGraduacion3']);
			}
			if (isset($_SESSION['CentroUniversitario3'])) {
				unset($_SESSION['CentroUniversitario3']);
			}
			if (isset($_SESSION['Carrera4'])) {
				unset($_SESSION['Carrera4']);
			}
			if (isset($_SESSION['FechaGraduacion4'])) {
				unset($_SESSION['FechaGraduacion4']);
			}
			if (isset($_SESSION['CentroUniversitario4'])) {
				unset($_SESSION['CentroUniversitario4']);
			}
			if (isset($_SESSION['Carrera5'])) {
				unset($_SESSION['Carrera5']);
			}
			if (isset($_SESSION['FechaGraduacion5'])) {
				unset($_SESSION['FechaGraduacion5']);
			}
			if (isset($_SESSION['CentroUniversitario5'])) {
				unset($_SESSION['CentroUniversitario5']);
			}
			if (isset($_SESSION['NombrePdf'])) {
				unset($_SESSION['NombrePdf']);
			}
			if (isset($_SESSION['CodigoEscolar'])) {
				unset($_SESSION['CodigoEscolar']);
			}
			if (isset($_SESSION['codigobarras'])) {
				unset($_SESSION['codigobarras']);
			}
			if (isset($_SESSION['SecuenciaDocumentos'])) {
				unset($_SESSION['SecuenciaDocumentos']);
			}
			if (isset($_SESSION['LecturaNombreCompleto'])) {
				unset($_SESSION['LecturaNombreCompleto']);
			}
			if (isset($_SESSION['LecturaCarrera'])) {
				unset($_SESSION['LecturaCarrera']);
			}
			if (isset($_SESSION['LecturaFechaGraduacion'])) {
				unset($_SESSION['LecturaFechaGraduacion']);
			}
			if (isset($_SESSION['LecturaCentroUniversitario'])) {
				unset($_SESSION['LecturaCentroUniversitario']);
			}
			if (isset($_SESSION['Incorrecto'])) {
				unset($_SESSION['Incorrecto']);
			}
			if (isset($_SESSION['LecturaCodigoEscolar'])) {
				unset($_SESSION['LecturaCodigoEscolar']);
			}
			if (isset($_SESSION['mostrar'])) {
				unset($_SESSION['mostrar']);
			}
			if (isset($_SESSION['LecturaComplementos'])) {
				unset($_SESSION['LecturaComplementos']);
			}
			if (isset($_SESSION['bNombreCompleto'])) {
				unset($_SESSION['bNombreCompleto']);
			}
			if (isset($_SESSION['bCarrera'])) {
				unset($_SESSION['bCarrera']);
			}
			if (isset($_SESSION['bFechaGraduacion'])) {
				unset($_SESSION['bFechaGraduacion']);
			}
			if (isset($_SESSION['bCentroUniversitario'])) {
				unset($_SESSION['bCentroUniversitario']);
			}
			if (isset($_SESSION['bCarrera2'])) {
				unset($_SESSION['bCarrera2']);
			}
			if (isset($_SESSION['bFechaGraduacion2'])) {
				unset($_SESSION['bFechaGraduacion2']);
			}
			if (isset($_SESSION['bCentroUniversitario2'])) {
				unset($_SESSION['bCentroUniversitario2']);
			}
			if (isset($_SESSION['bCarrera3'])) {
				unset($_SESSION['bCarrera3']);
			}
			if (isset($_SESSION['bFechaGraduacion3'])) {
				unset($_SESSION['bFechaGraduacion3']);
			}
			if (isset($_SESSION['bCentroUniversitario3'])) {
				unset($_SESSION['bCentroUniversitario3']);
			}
			if (isset($_SESSION['bCarrera4'])) {
				unset($_SESSION['bCarrera4']);
			}
			if (isset($_SESSION['bFechaGraduacion4'])) {
				unset($_SESSION['bFechaGraduacion4']);
			}
			if (isset($_SESSION['bCentroUniversitario4'])) {
				unset($_SESSION['bCentroUniversitario4']);
			}
			if (isset($_SESSION['bCarrera5'])) {
				unset($_SESSION['bCarrera5']);
			}
			if (isset($_SESSION['bFechaGraduacion5'])) {
				unset($_SESSION['bFechaGraduacion5']);
			}
			if (isset($_SESSION['bCentroUniversitario5'])) {
				unset($_SESSION['bCentroUniversitario5']);
			}
			if (isset($_SESSION['bCodigoEscolarCorregido'])) {
				unset($_SESSION['bCodigoEscolarCorregido']);
			}
			if (isset($_SESSION['ActivoProcesar'])) {
				unset($_SESSION['ActivoProcesar']);
			}
			if (isset($_SESSION['ActivoGuardar'])) {
				unset($_SESSION['ActivoGuardar']);
			}
			if (isset($_SESSION['ActivoDuda'])) {
				unset($_SESSION['ActivoDuda']);
			}
			if (isset($_SESSION['ActivoObtener'])) {
				unset($_SESSION['ActivoObtener']);
			}
			echo'<script type="text/javascript">
			alert("Registro Marcado como Dañado Correctamente");
			location.href="captura.php";
			</script>';
		} else {
			echo'<script type="text/javascript">
			alert("No se pudo marcar correctamente ['.$CodigoBarras.'_'.$Secuencia.'"]);
			location.href="captura.php";
			</script>';
		}					
	} 
    else 
    {
        if ($GrabarDuda == "")
        {
            $ExisteExp = "SELECT * FROM DBUDEG.dbo.Captura WHERE CodigoBarras = '$CodigoBarras' and SecuenciaDocumentos = '$Secuencia'";
            $Resultado = sqlsrv_query($conn,$ExisteExp);
            $Respuesta = SQLSRV_FETCH_ARRAY($Resultado);
            if ($Respuesta > 0) {	
                echo'<script type="text/javascript">
                alert("Registro Existente No se puedo grabar ['.$CodigoBarras.'_'.$Secuencia.'"]);
                location.href="captura.php";
                </script>';
            }else{	
                /*echo'<script type="text/javascript">
                alert("bCurpCorregido ['.$GrabarDuda.']");
                </script>';	*/				
                date_default_timezone_set('America/Mexico_City');    
                $hora_final= date(' h:i:s a', time()); 
                $querie = "INSERT INTO DBUDEG.dbo.Captura (CodigoBarras,SecuenciaDocumentos,NombrePdf,CodigoEscolar,CodigoEscolarCorregido,ComentarioExpediente,NombreCompleto,Carrera,FechaGraduacion,CentroUniversitario,Carrera2,FechaGraduacion2,CentroUniversitario2,Carrera3,FechaGraduacion3,CentroUniversitario3,Carrera4,FechaGraduacion4,CentroUniversitario4,Carrera5,FechaGraduacion5,CentroUniversitario5,Usuario,Comprobante,DireccionIP,bErrorNombreCompleto,bErrorCarrera,bErrorFechaGraduacion,bErrorCentroUniversitario,bErrorCarrera2,bErrorFechaGraduacion2,bErrorCentroUniversitario2,bErrorCarrera3,bErrorFechaGraduacion3,bErrorCentroUniversitario3,bErrorCarrera4,bErrorFechaGraduacion4,bErrorCentroUniversitario4,bErrorCarrera5,bErrorFechaGraduacion5,bErrorCentroUniversitario5,bNombreCompleto,bCarrera,bFechaGraduacion,bCentroUniversitario,bCarrera2,bFechaGraduacion2,bCentroUniversitario2,bCarrera3,bFechaGraduacion3,bCentroUniversitario3,bCarrera4,bFechaGraduacion4,bCentroUniversitario4,bCarrera5,bFechaGraduacion5,bCentroUniversitario5,bCodigoEscolarCorregido,bGlobal,ImagenRotada,HojasBlancas,VariosExpedientes,bSinRevision,bCapturados) VALUES ('$CodigoBarras','$Secuencia','$Pdf','$CodigoEscolar','$CodigoEscolarCorregido','$Comentarios','$NombreCompleto','$Carrera','$FechaGraduacion','$CentroUniversitario','$Carrera2','$FechaGraduacion2','$CentroUniversitario2','$Carrera3','$FechaGraduacion3','$CentroUniversitario3','$Carrera4','$FechaGraduacion4','$CentroUniversitario4','$Carrera5','$FechaGraduacion5','$CentroUniversitario5','$_SESSION[loginudeg]','$ConComprobante','$_SESSION[IP]','$cbNombreCompleto', '$cbCarrera','$cbFechaGraduacion','$cbCentroUniversitario', '$cbCarrera2','$cbFechaGraduacion2','$cbCentroUniversitario2', '$cbCarrera3','$cbFechaGraduacion3','$cbCentroUniversitario3', '$cbCarrera4','$cbFechaGraduacion4','$cbCentroUniversitario4', '$cbCarrera5','$cbFechaGraduacion5','$cbCentroUniversitario5','$bNombreCompleto','$bCarrera','$bFechaGraduacion','$bCentroUniversitario','$bCarrera2','$bFechaGraduacion2','$bCentroUniversitario2','$bCarrera3','$bFechaGraduacion3','$bCentroUniversitario3','$bCarrera4','$bFechaGraduacion4','$bCentroUniversitario4','$bCarrera5','$bFechaGraduacion5','$bCentroUniversitario5','$bCodigoEscolarCorregido','$totalExpedientes','$ImagenRotada','$HojasBlancas','$VariosExpedientes','$bSinRevision','$bCapturados')";
                /*$fh = fopen("fichero/query.txt", 'w') or die("Se produjo un error al crear el archivo");
                fwrite($fh, $querie) or die("No se pudo escribir en el archivo");			
                fclose($fh);*/
                $rquerie = sqlsrv_prepare($conn,$querie);		
                if (sqlsrv_execute($rquerie)) {
                    /*$querieupdate = "UPDATE DBUDEG.dbo.BaseTrabajar SET estatus = 1 WHERE Usuario = '$_SESSION[loginudeg]' and Pdf = '$Pdf'";	*/
                    $querieupdate = "UPDATE DBUDEG.dbo.Digitalizacion SET estatus = 1 WHERE Usuario = '$_SESSION[loginudeg]' and NombrePdf = '$Pdf'";                
                    /*$fh = fopen("fichero/queryactualizarbasetrabajo.txt", 'w') or die("Se produjo un error al crear el archivo");
                    fwrite($fh, $querieupdate) or die("No se pudo escribir en el archivo");			
                    fclose($fh);   */ 
                    if (SQLSRV_QUERY($conn,$querieupdate)) {
                        $Expedientes = "SELECT top 1 amdhms FROM DBUDEG.dbo.Duda WHERE NombrePdf = '$_SESSION[NombrePdf]' AND Usuario = '$_SESSION[loginudeg]' and Estatus = 'RESUELTA' ORDER BY NEWID()";

                        /*$fh = fopen("fichero/queryactualizarduda.txt", 'w') or die("Se produjo un error al crear el archivo");
                        fwrite($fh, $Expedientes) or die("No se pudo escribir en el archivo");			
                        fclose($fh);   */ 
                            
                        $Expediente = SQLSRV_QUERY($conn,$Expedientes);
                        $ObtencionExpediente = SQLSRV_FETCH_ARRAY($Expediente,SQLSRV_FETCH_ASSOC);
                        if ($ObtencionExpediente > 0) {
                                /*echo'<script type="text/javascript">
                                alert("CentroUniversitario ['.$CentroUniversitario.']");
                                </script>';*/

                            $update_checklist = "UPDATE DBUDEG.dbo.Duda SET estatus = 'PROCESADO', Bloqueado = 'SI' WHERE Usuario = '$_SESSION[loginudeg]' and Estatus = 'RESUELTA' and NombrePdf = '$_SESSION[NombrePdf]'";
                            $resp_checklist = sqlsrv_prepare($conn,$update_checklist);
                            if (sqlsrv_execute($resp_checklist)) 
                            {	
                            } else {
                                echo'<script type="text/javascript">
                                alert("Registro NO Actualizado en la tabla de duda ['.$CodigoBarras.']");
                                </script>';       
                            }
                        }                        

                        if (isset($_SESSION['NombreCompleto'])) {
                            unset($_SESSION['NombreCompleto']);
                        }
                        if (isset($_SESSION['Carrera'])) {
                            unset($_SESSION['Carrera']);
                        }
                        if (isset($_SESSION['FechaGraduacion'])) {
                            unset($_SESSION['FechaGraduacion']);
                        }
                        if (isset($_SESSION['CentroUniversitario'])) {
                            unset($_SESSION['CentroUniversitario']);
                        }
                        if (isset($_SESSION['Carrera2'])) {
                            unset($_SESSION['Carrera2']);
                        }
                        if (isset($_SESSION['FechaGraduacion2'])) {
                            unset($_SESSION['FechaGraduacion2']);
                        }
                        if (isset($_SESSION['CentroUniversitario2'])) {
                            unset($_SESSION['CentroUniversitario2']);
                        }
                        if (isset($_SESSION['Carrera3'])) {
                            unset($_SESSION['Carrera3']);
                        }
                        if (isset($_SESSION['FechaGraduacion3'])) {
                            unset($_SESSION['FechaGraduacion3']);
                        }
                        if (isset($_SESSION['CentroUniversitario3'])) {
                            unset($_SESSION['CentroUniversitario3']);
                        }
                        if (isset($_SESSION['Carrera4'])) {
                            unset($_SESSION['Carrera4']);
                        }
                        if (isset($_SESSION['FechaGraduacion4'])) {
                            unset($_SESSION['FechaGraduacion4']);
                        }
                        if (isset($_SESSION['CentroUniversitario4'])) {
                            unset($_SESSION['CentroUniversitario4']);
                        }
                        if (isset($_SESSION['Carrera5'])) {
                            unset($_SESSION['Carrera5']);
                        }
                        if (isset($_SESSION['FechaGraduacion5'])) {
                            unset($_SESSION['FechaGraduacion5']);
                        }
                        if (isset($_SESSION['CentroUniversitario5'])) {
                            unset($_SESSION['CentroUniversitario5']);
                        }        
                        if (isset($_SESSION['NombrePdf'])) {
                            unset($_SESSION['NombrePdf']);
                        }
                        if (isset($_SESSION['CodigoEscolar'])) {
                            unset($_SESSION['CodigoEscolar']);
                        }
                        if (isset($_SESSION['codigobarras'])) {
                            unset($_SESSION['codigobarras']);
                        }
                        if (isset($_SESSION['SecuenciaDocumentos'])) {
                            unset($_SESSION['SecuenciaDocumentos']);
                        }
                        if (isset($_SESSION['LecturaNombreCompleto'])) {
                            unset($_SESSION['LecturaNombreCompleto']);
                        }
                        if (isset($_SESSION['LecturaCarrera'])) {
                            unset($_SESSION['LecturaCarrera']);
                        }
                        if (isset($_SESSION['LecturaFechaGraduacion'])) {
                            unset($_SESSION['LecturaFechaGraduacion']);
                        }
                        if (isset($_SESSION['LecturaCentroUniversitario'])) {
                            unset($_SESSION['LecturaCentroUniversitario']);
                        }
                        if (isset($_SESSION['Incorrecto'])) {
                            unset($_SESSION['Incorrecto']);
                        }
                        if (isset($_SESSION['LecturaCodigoEscolar'])) {
                            unset($_SESSION['LecturaCodigoEscolar']);
                        }
                        if (isset($_SESSION['mostrar'])) {
                            unset($_SESSION['mostrar']);
                        }
                        if (isset($_SESSION['LecturaComplementos'])) {
                            unset($_SESSION['LecturaComplementos']);
                        }
                        if (isset($_SESSION['bNombreCompleto'])) {
                            unset($_SESSION['bNombreCompleto']);
                        }
                        if (isset($_SESSION['bCarrera'])) {
                            unset($_SESSION['bCarrera']);
                        }
                        if (isset($_SESSION['bFechaGraduacion'])) {
                            unset($_SESSION['bFechaGraduacion']);
                        }
                        if (isset($_SESSION['bCentroUniversitario'])) {
                            unset($_SESSION['bCentroUniversitario']);
                        }
                        if (isset($_SESSION['bCarrera2'])) {
                            unset($_SESSION['bCarrera2']);
                        }
                        if (isset($_SESSION['bFechaGraduacion2'])) {
                            unset($_SESSION['bFechaGraduacion2']);
                        }
                        if (isset($_SESSION['bCentroUniversitario2'])) {
                            unset($_SESSION['bCentroUniversitario2']);
                        }
                        if (isset($_SESSION['bCarrera3'])) {
                            unset($_SESSION['bCarrera3']);
                        }
                        if (isset($_SESSION['bFechaGraduacion3'])) {
                            unset($_SESSION['bFechaGraduacion3']);
                        }
                        if (isset($_SESSION['bCentroUniversitario3'])) {
                            unset($_SESSION['bCentroUniversitario3']);
                        }
                        if (isset($_SESSION['bCarrera4'])) {
                            unset($_SESSION['bCarrera4']);
                        }
                        if (isset($_SESSION['bFechaGraduacion4'])) {
                            unset($_SESSION['bFechaGraduacion4']);
                        }
                        if (isset($_SESSION['bCentroUniversitario4'])) {
                            unset($_SESSION['bCentroUniversitario4']);
                        }
                        if (isset($_SESSION['bCarrera5'])) {
                            unset($_SESSION['bCarrera5']);
                        }
                        if (isset($_SESSION['bFechaGraduacion5'])) {
                            unset($_SESSION['bFechaGraduacion5']);
                        }
                        if (isset($_SESSION['bCentroUniversitario5'])) {
                            unset($_SESSION['bCentroUniversitario5']);
                        }        
                        if (isset($_SESSION['bCodigoEscolarCorregido'])) {
                            unset($_SESSION['bCodigoEscolarCorregido']);
                        }
                        if (isset($_SESSION['ActivoProcesar'])) {
                            unset($_SESSION['ActivoProcesar']);
                        }
                        if (isset($_SESSION['ActivoGuardar'])) {
                            unset($_SESSION['ActivoGuardar']);
                        }
                        if (isset($_SESSION['ActivoDuda'])) {
                            unset($_SESSION['ActivoDuda']);
                        }
                        if (isset($_SESSION['ActivoObtener'])) {
                            unset($_SESSION['ActivoObtener']);
                        }            
                        echo'<script type="text/javascript">
                        alert("Registro Grabado Correctamente");
                        location.href="captura.php";
                        </script>';
                    } else {
                        echo'<script type="text/javascript">
                        alert("No se pudo actualizar correctamente ['.$CodigoBarras.'_'.$Secuencia.'"]);
                        location.href="captura.php";
                        </script>';
                    }					
                }else{
                    echo'<script type="text/javascript">
                    alert("No se pudo grabar el registro ['.$CodigoBarras.'_'.$Secuencia.'"]);
                    location.href="captura.php";
                    </script>';
                }
            }            
		} else {
            $ExisteExp = "SELECT * FROM DBUDEG.dbo.Duda WHERE CodigoBarras = '$CodigoBarras' and SecuenciaDocumentos = '$Secuencia' and amdhms =''";
            $Resultado = sqlsrv_query($conn,$ExisteExp);
            $Respuesta = SQLSRV_FETCH_ARRAY($Resultado);
            if ($Respuesta > 0) {	
                echo'<script type="text/javascript">
                alert("Registro Existente No se puedo grabar ['.$CodigoBarras.'_'.$Secuencia.'"]);
                location.href="captura.php";
                </script>';
            }else{	
                /*echo'<script type="text/javascript">
                alert("bCurpCorregido ['.$bCurpCorregido.']");
                </script>';	*/				
                date_default_timezone_set('America/Mexico_City');    
                $hora_final= date(' h:i:s a', time()); 
                $amdhms = date("Y").date("m").date("d").date("H").date("i").date("s"); 
                $querie = "INSERT INTO DBUDEG.dbo.Duda (amdhms,CodigoBarras,SecuenciaDocumentos,NombrePdf,CodigoEscolar,CodigoEscolarCorregido,ComentarioExpediente,NombreCompleto,Carrera,FechaGraduacion,CentroUniversitario,Carrera2,FechaGraduacion2,CentroUniversitario2,Carrera3,FechaGraduacion3,CentroUniversitario3,Carrera4,FechaGraduacion4,CentroUniversitario4,Carrera5,FechaGraduacion5,CentroUniversitario5,Usuario,Comprobante,DireccionIP,bErrorNombreCompleto,bErrorCarrera,bErrorFechaGraduacion,bErrorCentroUniversitario,bErrorCarrera2,bErrorFechaGraduacion2,bErrorCentroUniversitario2,bErrorCarrera3,bErrorFechaGraduacion3,bErrorCentroUniversitario3,bErrorCarrera4,bErrorFechaGraduacion4,bErrorCentroUniversitario4,bErrorCarrera5,bErrorFechaGraduacion5,bErrorCentroUniversitario5,bNombreCompleto,bCarrera,bFechaGraduacion,bCentroUniversitario,bCarrera2,bFechaGraduacion2,bCentroUniversitario2,bCarrera3,bFechaGraduacion3,bCentroUniversitario3,bCarrera4,bFechaGraduacion4,bCentroUniversitario4,bCarrera5,bFechaGraduacion5,bCentroUniversitario5,bCodigoEscolarCorregido,bGlobal,ImagenRotada,HojasBlancas,VariosExpedientes,bSinRevision,bCapturados,Estatus) VALUES ('$amdhms','$CodigoBarras','$Secuencia','$Pdf','$CodigoEscolar','$CodigoEscolarCorregido','$Comentarios','$NombreCompleto','$Carrera','$FechaGraduacion','$CentroUniversitario','$Carrera2','$FechaGraduacion2','$CentroUniversitario2','$Carrera3','$FechaGraduacion3','$CentroUniversitario3','$Carrera4','$FechaGraduacion4','$CentroUniversitario4','$Carrera5','$FechaGraduacion5','$CentroUniversitario5','$_SESSION[loginudeg]','$ConComprobante','$_SESSION[IP]','$cbNombreCompleto', '$cbCarrera','$cbFechaGraduacion','$cbCentroUniversitario', '$cbCarrera2','$cbFechaGraduacion2','$cbCentroUniversitario2', '$cbCarrera3','$cbFechaGraduacion3','$cbCentroUniversitario3', '$cbCarrera4','$cbFechaGraduacion4','$cbCentroUniversitario4', '$cbCarrera5','$cbFechaGraduacion5','$cbCentroUniversitario5','$bNombreCompleto','$bCarrera','$bFechaGraduacion','$bCentroUniversitario','$bCarrera2','$bFechaGraduacion2','$bCentroUniversitario2','$bCarrera3','$bFechaGraduacion3','$bCentroUniversitario3','$bCarrera4','$bFechaGraduacion4','$bCentroUniversitario4','$bCarrera5','$bFechaGraduacion5','$bCentroUniversitario5','$bCodigoEscolarCorregido','$totalExpedientes','$ImagenRotada','$HojasBlancas','$VariosExpedientes','$bSinRevision','$bCapturados','PENDIENTE')";
                /*$fh = fopen("fichero/query.txt", 'w') or die("Se produjo un error al crear el archivo");
                fwrite($fh, $querie) or die("No se pudo escribir en el archivo");			
                fclose($fh);*/
                $rquerie = sqlsrv_prepare($conn,$querie);		
                if (sqlsrv_execute($rquerie)) {
                    if (isset($_SESSION['NombreCompleto'])) {
                        unset($_SESSION['NombreCompleto']);
                    }
                    if (isset($_SESSION['Carrera'])) {
                        unset($_SESSION['Carrera']);
                    }
                    if (isset($_SESSION['FechaGraduacion'])) {
                        unset($_SESSION['FechaGraduacion']);
                    }
                    if (isset($_SESSION['CentroUniversitario'])) {
                        unset($_SESSION['CentroUniversitario']);
                    }
                    if (isset($_SESSION['Carrera2'])) {
                        unset($_SESSION['Carrera2']);
                    }
                    if (isset($_SESSION['FechaGraduacion2'])) {
                        unset($_SESSION['FechaGraduacion2']);
                    }
                    if (isset($_SESSION['CentroUniversitario2'])) {
                        unset($_SESSION['CentroUniversitario2']);
                    }
                    if (isset($_SESSION['Carrera3'])) {
                        unset($_SESSION['Carrera3']);
                    }
                    if (isset($_SESSION['FechaGraduacion3'])) {
                        unset($_SESSION['FechaGraduacion3']);
                    }
                    if (isset($_SESSION['CentroUniversitario3'])) {
                        unset($_SESSION['CentroUniversitario3']);
                    }
                    if (isset($_SESSION['Carrera4'])) {
                        unset($_SESSION['Carrera4']);
                    }
                    if (isset($_SESSION['FechaGraduacion4'])) {
                        unset($_SESSION['FechaGraduacion4']);
                    }
                    if (isset($_SESSION['CentroUniversitario4'])) {
                        unset($_SESSION['CentroUniversitario4']);
                    }
                    if (isset($_SESSION['Carrera5'])) {
                        unset($_SESSION['Carrera5']);
                    }
                    if (isset($_SESSION['FechaGraduacion5'])) {
                        unset($_SESSION['FechaGraduacion5']);
                    }
                    if (isset($_SESSION['CentroUniversitario5'])) {
                        unset($_SESSION['CentroUniversitario5']);
                    }        
                    if (isset($_SESSION['NombrePdf'])) {
                        unset($_SESSION['NombrePdf']);
                    }
                    if (isset($_SESSION['CodigoEscolar'])) {
                        unset($_SESSION['CodigoEscolar']);
                    }
                    if (isset($_SESSION['codigobarras'])) {
                        unset($_SESSION['codigobarras']);
                    }
                    if (isset($_SESSION['SecuenciaDocumentos'])) {
                        unset($_SESSION['SecuenciaDocumentos']);
                    }
                    if (isset($_SESSION['LecturaNombreCompleto'])) {
                        unset($_SESSION['LecturaNombreCompleto']);
                    }
                    if (isset($_SESSION['LecturaCarrera'])) {
                        unset($_SESSION['LecturaCarrera']);
                    }
                    if (isset($_SESSION['LecturaFechaGraduacion'])) {
                        unset($_SESSION['LecturaFechaGraduacion']);
                    }
                    if (isset($_SESSION['LecturaCentroUniversitario'])) {
                        unset($_SESSION['LecturaCentroUniversitario']);
                    }
                    if (isset($_SESSION['Incorrecto'])) {
                        unset($_SESSION['Incorrecto']);
                    }
                    if (isset($_SESSION['LecturaCodigoEscolar'])) {
                        unset($_SESSION['LecturaCodigoEscolar']);
                    }
                    if (isset($_SESSION['mostrar'])) {
                        unset($_SESSION['mostrar']);
                    }
                    if (isset($_SESSION['LecturaComplementos'])) {
                        unset($_SESSION['LecturaComplementos']);
                    }
                    if (isset($_SESSION['bNombreCompleto'])) {
                        unset($_SESSION['bNombreCompleto']);
                    }
                    if (isset($_SESSION['bCarrera'])) {
                        unset($_SESSION['bCarrera']);
                    }
                    if (isset($_SESSION['bFechaGraduacion'])) {
                        unset($_SESSION['bFechaGraduacion']);
                    }
                    if (isset($_SESSION['bCentroUniversitario'])) {
                        unset($_SESSION['bCentroUniversitario']);
                    }
                    if (isset($_SESSION['bCarrera2'])) {
                        unset($_SESSION['bCarrera2']);
                    }
                    if (isset($_SESSION['bFechaGraduacion2'])) {
                        unset($_SESSION['bFechaGraduacion2']);
                    }
                    if (isset($_SESSION['bCentroUniversitario2'])) {
                        unset($_SESSION['bCentroUniversitario2']);
                    }
                    if (isset($_SESSION['bCarrera3'])) {
                        unset($_SESSION['bCarrera3']);
                    }
                    if (isset($_SESSION['bFechaGraduacion3'])) {
                        unset($_SESSION['bFechaGraduacion3']);
                    }
                    if (isset($_SESSION['bCentroUniversitario3'])) {
                        unset($_SESSION['bCentroUniversitario3']);
                    }
                    if (isset($_SESSION['bCarrera4'])) {
                        unset($_SESSION['bCarrera4']);
                    }
                    if (isset($_SESSION['bFechaGraduacion4'])) {
                        unset($_SESSION['bFechaGraduacion4']);
                    }
                    if (isset($_SESSION['bCentroUniversitario4'])) {
                        unset($_SESSION['bCentroUniversitario4']);
                    }
                    if (isset($_SESSION['bCarrera5'])) {
                        unset($_SESSION['bCarrera5']);
                    }
                    if (isset($_SESSION['bFechaGraduacion5'])) {
                        unset($_SESSION['bFechaGraduacion5']);
                    }
                    if (isset($_SESSION['bCentroUniversitario5'])) {
                        unset($_SESSION['bCentroUniversitario5']);
                    }        
                    if (isset($_SESSION['bCodigoEscolarCorregido'])) {
                        unset($_SESSION['bCodigoEscolarCorregido']);
                    }     
                    if (isset($_SESSION['ActivoProcesar'])) {
                        unset($_SESSION['ActivoProcesar']);
                    }
                    if (isset($_SESSION['ActivoGuardar'])) {
                        unset($_SESSION['ActivoGuardar']);
                    }
                    if (isset($_SESSION['ActivoDuda'])) {
                        unset($_SESSION['ActivoDuda']);
                    }
                    if (isset($_SESSION['ActivoObtener'])) {
                        unset($_SESSION['ActivoObtener']);
                    }                       
                    echo'<script type="text/javascript">
                    alert("Registro de Duda Grabado Correctamente");
                    location.href="captura.php";
                    </script>';
                }else{
                    echo'<script type="text/javascript">
                    alert("No se pudo grabar el registro ['.$CodigoBarras.'_'.$Secuencia.'"]);
                    location.href="captura.php";
                    </script>';
                }
            }            
        }
	}	
?>