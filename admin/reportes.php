<?php
ini_set('display_errors','1');
//recordar l variable de sesion
session_start();
//validar que se cree una variable de sesion al pasar por login

if (isset($_SESSION['administradorssas'])) {
    
}else{
    header('Location:../Login.php');
}

 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script language="javascript" type="text/javascript">
    window.history.forward();
</script>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="../assets/img/logonuevo.jpg"/>
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>
<body >
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="inicioadmin.php">
                        <img src="assets/img/spert.jpg" />

                    </a>
                    <a class="navbar-brand ">Sperto Digital</a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="cerrar_sesion.php" style="color:#fff;">CERRAR SESI&Oacute;N</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    <li class="active-link">
                        <a href="inicioadmin.php" ><i class="fa fa-desktop "></i>Inicio <span class="badge"></span></a>
                    </li>
                   

                    <li>
                        <a href="consultas.php"><i class="fa fa-users "></i>Registros <span class="badge"></span></a>
                    </li>


                    <li>
                        <a href="Reportes.php"><i class="fa fa-file-pdf-o "></i>Reportes</a>
                    </li>
                    <li>
                        <a href="../PreRecepcion.php"  target="popup" onClick="window.open(this.href, this.target, width=1280px,height=540); return false; window.close(); "><i class="fa fa-file-text-o"></i>Prerecepci&oacute;n</a>
                    </li>

                    <li>
                        <a href="../Recepcion.php"  target="popup" onClick="window.open(this.href, this.target, width=540px,height=540); return false; window.close(); "><i class="fa fa-folder "></i>Recepci&oacute;n</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>ADMINISTRADOR</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Bienvenido <?php echo $_SESSION['loginssas'];?>! </strong> 
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                            <div class="row text-center pad-top">                
                 

               <!--     <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="Reportes_remotos.php" >
 <i class="fa fa-file-excel-o fa-5x"></i>
                      <h4>Remotos</h4>
                      </a>
                      </div>
                     
                     
                  </div> -->

                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="reporte-Prerecepcion.php"  target="popup" onClick="window.open(this.href, this.target, width=1280px,height=540); return false; window.close(); " >
 <i class="fa fa-file-pdf-o fa-5x"></i>
                      <h4>PreRecepci&oacute;n</h4>
                      </a>
                      </div>
                     
                     
                  </div> 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="reporte-recepcion.php"  target="popup" onClick="window.open(this.href, this.target, width=540px,height=540); return false; window.close(); " >
 <i class="fa fa-file-pdf-o fa-5x"></i>
                      <h4>Recepci&oacute;n</h4>
                      </a>
                      </div>
                     
                     
                  </div>  


                 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="reporte_digitalizacion.php" target="popup" onClick="window.open(this.href, this.target, width=1280px,height=120); return false; window.close(); ">
 <i class="fa fa-file-excel-o fa-5x"></i>
                      <h4>Digitalizaci&oacute;n</h4>
                      </a>
                      </div>
                     
                     
                  </div>


                   

                   
              </div>
                 <!-- /. ROW  --> 
          
                  <!-- /. ROW  -->    
                 <div class="row text-center pad-top">
                   
                 
                  

              </div>
                 <!-- /. ROW  -->  
                 
                  <!-- /. ROW  -->  
                
                 <!-- /. ROW  -->   
                  <!-- /. ROW  --> 
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
    <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2022 | Diseñado por: <a>Sperto  Digital</a>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
  
   
</body>
</html>
