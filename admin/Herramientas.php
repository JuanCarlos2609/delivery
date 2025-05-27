<?php
ini_set('display_errors','1');
//recordar l variable de sesion
session_start();
//validar que se cree una variable de sesion al pasar por login

if (isset($_SESSION['administradorssas'])) {
    
}else{
    header('Location:../Login.php');
}

include 'conexion.php';
date_default_timezone_set('America/Mexico_City'); 
$fecha = date('Y-m-d');


$query3 = "SELECT Nombre,ApP,ApM FROM Usuarios WHERE Usuario = '$_SESSION[loginssas]'" ;
$res = sqlsrv_query($conn,$query3);
$filee =  sqlsrv_fetch_array($res);
if($filee > 0){

    $user = $filee['Nombre'];
    $user1 = $filee['ApP'];
    $user2 = $filee['ApM'];
    
    $Nombre=$user.' '. $user1.' '. $user2;


    
    
}

$meta = null;
$mensaje1 = null;
$nacionalidad = null;
$mensaje2 = null;
$sede = null;
$mensaje3 = null;

$cb = null;
$mensaje4 = null;

                           if (isset($_POST['ingresar1'])) {
                            $sede = $_POST['sed'];
                            $expediennte = $_POST['expediente'];
                            $meta = $_POST['meta'];
                            $verif = "SELECT Sede FROM Metas WHERE Sede = '$sede'";
                            $verif1 = sqlsrv_query($conn,$verif);
                            $verif2 = sqlsrv_fetch_array($verif1);

                            $sed = $verif2['Sede'];

                            if ($sede === $sed) {
                                 $mensaje1 = "Esta sede ya cuenta con una meta";
                                $sede = null;
                                $expediennte = null;
                                $meta = null;
                             } else{
                                $insertmeta = "INSERT INTO Metas (Sede,Meta_hoja, Meta_expediente) VALUES ('$sede','$meta','$expediennte')";
                                $insertmeta1 = sqlsrv_prepare($conn,$insertmeta);

                                if (sqlsrv_execute($insertmeta1)) {
                                    $mensaje1 = "Registro existoso!!!";
                                     $sede = null;
                                $expediennte = null;
                                $meta = null;
                                }else{
                                    $mensaje1 = "No se Registro, algo salio mal, comuniquelo con el administrador";
                                     $sede = null;
                                $expediennte = null;
                                $meta = null;
                                }

                             }


                                
                        }


                        if (isset($_POST['ingresar2'])) {
                            $nacionalidad = $_POST['nacionalidad'];

                            $verificar = "SELECT Pais FROM nacionalidades WHERE Pais LIKE '%$nacionalidad%'";
                            $verificar1 = sqlsrv_query($conn,$verificar);
                            $verificar2 = sqlsrv_fetch_array($verificar1);

                            $pais = $verificar2['Pais'];

                            if ($nacionalidad === $pais) {
                                $mensaje2 = "Este Pais ya esta dado de alta, intente registrando otro diferente.";
                                $nacionalidad = null;
                            }else{


                                $con =sqlsrv_query($conn,"SELECT MAX(Secuencia) as Secuencia FROM nacionalidades");
                                $con = sqlsrv_fetch_array($con);
                                $codigo = (empty($con['Secuencia']) ? 1 : $con['Secuencia']+=1);

                                $insertarpais = "INSERT INTO nacionalidades (Secuencia,Pais) VALUES ('$codigo','$nacionalidad')";
                                $insertpais = sqlsrv_prepare($conn,$insertarpais);

                                if (sqlsrv_execute($insertpais)) {
                                    $mensaje2 = "Registro exitoso!!!";
                                }else{
                                     $mensaje2 = "No se Registro, algo salio mal, comuniquelo con el administrador";
                                     $nacionalidad = null;
                                }

                            }

                                
                        }


                        if (isset($_POST['ingresar3'])) {
                                $sedee = $_POST['sede'];
                                $ver = "SELECT Sede FROM Sede WHERE Sede = '$sedee'";
                                $ver1 = sqlsrv_query($conn,$ver);
                                $ver2 = sqlsrv_fetch_array($ver1);

                                $sedeee = $ver2['Sede'];

                                if ($sedee === $sedeee) {
                                    $mensaje3 = "Esta sede ya fue registrada, intentelo con una sede diferente";
                                    $sedee=null;
                               }else{

                                    $con1 =sqlsrv_query($conn,"SELECT MAX(Secuencia) as Secuencia FROM Sede");
                                $con1 = sqlsrv_fetch_array($con1);
                                $codigo1 = (empty($con['Secuencia']) ? 1 : $con['Secuencia']+=1);



                                  $insertsede = "INSERT INTO Sede (Secuencia,Sede) VALUES ('$codigo','$sedee')";
                                  $insertsede1 = sqlsrv_prepare($conn,$insertsede);

                                  if (sqlsrv_execute($insertsede1)) {
                                      $mensaje3 = "Registro exitoso!!!";
                                      $sedee=null;
                                  }else{
                                    $mensaje3 = "Algo salio mal, comuniquelo con el administrador";
                                    $sedee=null;
                                  }
                               }

                        }


                        if (isset($_POST['eliminar'])) {

                            $cb = $_POST['cbdigitalizar'];

                            $buscarcb = "SELECT CodigoBarras FROM Digitalizacion WHERE CodigoBarras = '$cb'";
                            $buscarcb1 = sqlsrv_query($conn,$buscarcb);

                            $buscarcb = sqlsrv_fetch_array($buscarcb1);

                            if ($buscarcb > 0) {
                                $eliminar = "DELETE FROM Digitalizacion where CodigoBarras = '$cb'";
                                $eliminar1 = sqlsrv_prepare($conn,$eliminar);

                                if (sqlsrv_execute($eliminar1)) {
                                    $mensaje4 = "Puede volver a digitalizar el documento";
                                }
                            }else{
                                $mensaje4 = "El codigo de barra que desea eliminar no se encuentra digitalizado";
                            }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
                                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
                                <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <title>Administraci&oacute;n</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="../assets/img/logonuevo.jpg"/>
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
      


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
                        <a href="registro.php"><i class="fa fa-users "></i>Registros <span class="badge"></span></a>
                    </li>


                    <li>
                        <a href="reportes.php"><i class="fa fa-file-pdf-o "></i>Reportes<span class="badge"></span></a>
                    </li>
                    <li>
                        <a href="../PreRecepcion.php"  target="popup" onClick="window.open(this.href, this.target, width=1280px,height=540); return false; window.close(); "><i class="fa fa-file-text-o"></i>Prerecepci&oacute;n<span class="badge"></span></a>
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
                  
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="alert alert-info">
                             <strong>Bienvenido <?php echo $_SESSION['loginssas'];?>! </strong> 
                        </div>
                       
                    </div>
                    </div>
                  <!-- /. ROW  --> 
                    <div>
                
                          <form class="needs-validation" name="form_01"  method="POST">
                              <div class="form-row">
                                <div class="col-md-4 mb-3">
                                  <label for="validationTooltip01">Fecha</label>
                                  <input type="date" class="form-control" id="validationTooltip01" name="fecha" placeholder="Fecha" value="<?php echo $fecha ?>" readonly required>
                                  <div class="valid-tooltip">
                                    
                                  </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label for="validationTooltipUsername">Usuario</label>
                                  <div class="input-group">
                                  <input type="text" readonly value="<?php echo $_SESSION['loginssas']?>" class="form-control" id="validationTooltipUsername" name="user" placeholder="Usuario" aria-describedby="validationTooltipUsernamePrepend" required>
                                  </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                  <label for="validationTooltip02">Nombre del usuario</label>
                                  <input type="text" name="Username" readonly value="<?php echo $Nombre ?>" class="form-control" id="validationTooltip02" placeholder="Last name"  required>
                                  <div class="valid-tooltip">
                                    
                                  </div>
                                </div>

                                
                              </div>
                               <div class="form-row">
                              
                              <div class="form-row">
                                
                                <div class="col-md-3 mb-3" >
                                  <label  >Meta del proyecto por hoja</label><br>
                                  <input  type="number" class="form-control" value="<?php echo $meta; ?>"  onkeyup="mayus(this);" name="meta" placeholder="Ingrese la meta del proyecto" >
                                  <label  >Meta del proyecto por expediente</label><br>
                                  <input  type="number" class="form-control" value="<?php echo $expediente; ?>"  onkeyup="mayus(this);" name="expediente" placeholder="Ingrese la meta del proyecto por expediente" >

                                   <label  >Sede</label><br>
                                  <div class="form-control" >

                                  <select class="col-md-10 mb-7" name="sed">
                                      <option  value=null >Selecciona:</option>
                                      <?php
            include 'conexion.php';
            $alta = "SELECT * FROM Sede";
            $fila = sqlsrv_query($conn,$alta);
           while( $valor =  sqlsrv_fetch_array($fila)){
            echo '<option value='.$valor[Sede].'>'.$valor[Sede].'</option>';
          }
            ?> 
                                  </select>
                              </div>
                                  
                              <div><br>
                                <input  class="btn btn-primary" name="ingresar1"   onclick="return validacion1();" type="submit" value="ingresar">
                                  
                                
                              </div>
                              
                                </div>
                               
                              </div>
                              
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-3" style="width:60%">
                                  <label for="validationTooltip03">Mensaje</label><br>
                                  <input type="text" class="form-control" name="mensaje1"  value="<?php echo $mensaje1 ?>" id="validationTooltip03" placeholder="Mensaje" readonly>
                                  
                                
                              </div>
                               
                            </div>

                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br>
                           <!--- <div class="form-row">
                              
                              <div class="form-row">
                                
                                <div class="col-md-3 mb-3" >
                                  <label  >Ingrese una nacionalidad</label><br>
                                  <input  type="text" class="form-control" value="<?php echo $nacionalidad; ?>"  onkeyup="mayus(this);" name="nacionalidad" placeholder="Ingrese la  nacionalidad " >
                                  
                              <div><br>
                                <input  class="btn btn-primary" name="ingresar2"   onclick="return validacion2();" type="submit" value="ingresar">
                                  
                                
                              </div>
                                </div>
                               
                              </div>
                              
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-3" style="width:60%">
                                  <label for="validationTooltip03">Mensaje</label><br>
                                  <input type="text" class="form-control" name="mensaje2"  value="<?php echo $mensaje2 ?>" id="validationTooltip03" placeholder="Mensaje" readonly>
                                  
                                
                              </div>
                               
                            </div>

                            </div>-->
                            <!--<br><br><br><br><br>
                            <div class="form-row">
                              
                              <div class="form-row">
                                
                                <div class="col-md-3 mb-3" >
                                  <label >Ingrese una nueva sede</label><br>
                                  <input  type="text" class="form-control" value="<?php echo $sede; ?>"  onkeyup="mayus(this);" name="sede" placeholder="Ingrese la  sede" >
                                  
                              <div><br>
                                <input  class="btn btn-primary" name="ingresar3"   onclick="return validacion3();" type="submit" value="ingresar">
                                  
                                
                              </div>
                                </div>
                               
                              </div
                              
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-3" style="width:60%">
                                  <label for="validationTooltip03">Mensaje</label><br>
                                  <input type="text" class="form-control" name="mensaje3"  value="<?php echo $mensaje3 ?>" id="validationTooltip03" placeholder="Mensaje" readonly>
                                  
                                
                              </div>
                               
                            </div>

                            </div>>-->
                            <br><br><br>
                            <div class="form-row">
                              
                              <div class="form-row">
                                
                                <div class="col-md-3 mb-3" >
                                  <label >Eliminar para volver a digitalizar</label><br>
                                  <input  type="text" class="form-control"   onkeyup="mayus(this);" name="cbdigitalizar" placeholder="Ingrese el codigo de barras a reversar" >
                                  
                              <div><br>
                                <input  class="btn btn-primary" name="eliminar"   onclick="return validacion4();" type="submit" value="Eliminar">
                                  
                                
                              </div>
                                </div>
                               
                              </div>
                              
                            
                            <div class="form-row">
                                <div class="col-md-6 mb-3" style="width:60%">
                                  <label for="validationTooltip03">Mensaje</label><br>
                                  <input type="text" class="form-control" name="mensaje3"  value="<?php echo $mensaje4 ?>" id="validationTooltip03" placeholder="Mensaje" readonly>
                                  
                                
                              </div>
                               
                            </div>

                            </div>


                                               
                              
                            </form>
                    </div>
                 <!-- /. ROW  --> 
          
                  <!-- /. ROW  -->    
                 <div class="row text-center pad-top" id="datos_buscador">
                   
                 
                  

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
          
<script type="text/javascript">
    function mayus(e){
                        e.value = e.value.toUpperCase();
                }
                function validacion1(){



            if (document.form_01.meta.value.length==0){
            alert("Tiene que escribir la meta")
            document.form_01.meta.focus()
            return false;
            }

            if (document.form_01.expediente.value.length==0){
            alert("Tiene que escribir la meta")
            document.form_01.expediente.focus()
            return false;
            }

           if (document.form_01.sed.selectedIndex == 0) {
                alert("Selecciona una sede");
                document.form_01.sed.focus();
                return false;
            }



            
            
            document.form_01.submit();
            
        }
 
 function validacion2(){



            if (document.form_01.nacionalidad.value.length==0){
            alert("Tiene que escribir la nacionalidad")
            document.form_01.nacionalidad.focus()
            return false;
            }

           

            
            
            document.form_01.submit();
            
        }
 



                  function validacion3(){



            if (document.form_01.sede.value.length==0){
            alert("Tiene que escribir la sede")
            document.form_01.sede.focus()
            return false;
            }

           

            
            
            document.form_01.submit();
            
        }
 
</script>

<script type="text/javascript">
    $("input[name='codigobarra']").keydown(function(e) {
    if(e.which <= 10) {
        $.post('buscarcaja.php', {
            ID : $("input[name='codigobarra']").val()
        }, function(data){
            $('#datos_buscador').html(data);
        });
    }
});
</script>
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
