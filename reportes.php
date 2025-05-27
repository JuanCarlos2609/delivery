<?php
ini_set('display_errors','1');
//recordar l variable de sesion
session_start();
//validar que se cree una variable de sesion al pasar por login

if (isset($_SESSION['administradorssas']) || isset($_SESSION['recepcion'])) {
    
}else{
    header('Location:Login.php');
}

 ?>

<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script language="javascript" type="text/javascript">
    window.history.forward();
</script>
      <meta charset="utf-8" />
	<meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportes</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="admin/assets/img/logonuevo.jpg"/>
     <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
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
                  <a href="" onclick ="window.close()" style="color:#fff;">Salir</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 


                    
                   

                    

                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>Vista de reportes</h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong> </strong> 
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
                           <a href="reporte-Prerecepcion.php"   >
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
