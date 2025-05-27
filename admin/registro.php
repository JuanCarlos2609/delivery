<?php
    ini_set('display_errors','1');
    session_start();
    if (isset($_SESSION['administradorudeg'])) {    
    }else{
        header('Location:../Login.php');
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link rel="icon" type="image/jpg" href="../assets/img/logonuevo.jpg"/>
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
    <style type="text/css">
.tableWrap {
  width: 100%;  
  height: 200px;
  border: 1px solid black;
  overflow: auto;
}
thead tr th {
  position: sticky;
  top: 0;
}
table {
 border-collapse: collapse;
}
th {
  padding: 6px;
  padding-left: 6px;
  border-left: 1px dotted rgba(100, 109, 124, 0.6);
  border-bottom: 1px solid #e8e8e8;
  background: #ffc491;
  text-align: left;
  box-shadow: 0px 0px 0 2px #e8e8e8;
}

table {
  width: 100%;
  font-family: sans-serif;
}
table td {
  padding: 11px;
}
tbody tr {
  border-bottom: 2px solid #e8e8e8;
}
thead {
  font-weight: 100;
  color: rgba(0, 0, 0, 0.85);
}
tbody tr:hover {
  background: #e6f7ff;
}
    </style>
</head>
<body>
    <script>
        function mayus(e){
            e.value = e.value.toUpperCase();
        }
      </script>          
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
                     <li> 
                        <a href="inicioadmin.php" ><i class="fa fa-desktop "></i>Inicio <span class="badge"></span></a>
                    </li>
                    <li class="active-link">
                        <a href="registro.php"><i class="fa fa-users "></i>Registros <span class="badge"></span></a>
                    </li>
                    <li>
                            <a href="../captura.php"><i class="fa fa-pencil-square-o"></i>Captura<span class="badge"></span></a>
                    </li>
                </ul>
                            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12"></br>
                        <h2>Registro de Usuarios</h2>
                    </div>
                </div>
            <div >
                <form action="Insert.php" method="POST" class="login100-form validate-form p-b-33 p-t-5" name="form_01">
                        <div class="col-lg-6 col-md-6 ">
                            <label>Usuario</label>
                             <div class="wrap-input100 validate-input" data-validate = "Ingrese usuario" id="numInvEq">
                             <input type="text" class="input100" id="User"  name="usuario" placeholder="Ingrese Usuario" onkeyup="mayus(this)" required>
                             </div>
                            <label>Nombre</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese nombre" id="numInvEq1">
                            <input type="text" class="input100" id="name"  name="nombre" placeholder="Ingrese Nombre" onkeyup="mayus(this)" required>
                            </div>
                            <label>Apellido Paterno</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese Apellido">
                            <input type="text" class="input100"  name="app" placeholder="Ingrese su Apellido" onkeyup="mayus(this)"required />
                            </div>
                            <label>Apellido Materno</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese Apellido">
                            <input type="text" class="input100"  name="apm" placeholder="Ingrese su Apellido" onkeyup="mayus(this)"/>
                            </div>
                            <label>Contraseña</label>
                            <div class="wrap-input100 validate-input" data-validate = "Ingrese contraseña">
                            <input type="password" class="input100"  name="contra" placeholder="Ingrese su contraseña" required onkeyup="mayus(this)"  >
                            </div>
                            <label>PERFIL</label>
                            
                                <div class="form-control">
                                Administrador:&nbsp;   <input id="admin" type="checkbox" name="perfil[]" value="A" onchange="javascript:validar_check();" >
                                </div>
                                <div class="form-control">
                                Operador: &nbsp;       <input type="checkbox" id="opera" id="check" name="" onchange="javascript:operador();" >   
                                </div>
                                <div class="form-control">
                                Ejecutivo:&nbsp;      <input type="checkbox"  id="check1" name="" onchange="javascript:showContent1()" >
                                </div>
                                <div id="content1" style="display: none;"> 
                                    <input type="checkbox"  name="perfil[]" value="Ejecutivo">&nbsp;&nbsp;Nivel Ejecutivo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="checkbox"  name="perfil[]" value="Administrativo">&nbsp;&nbsp;Nivel Administrativo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="div_a_mostrar" id="content" style="display: none;">
                                   <div>
                                   <input type="checkbox" id="val1" name="perfil[]" value="C">&nbsp;&nbsp;Captura&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                   <input type="checkbox" id="val2" name="perfil[]" value="S">&nbsp;&nbsp;Sin Atributos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>                                            
                                </br>
                                <label>SEDE</label>
                                <div  data-validate = "Ingrese Sede">
                                <select id="sede" name="sed" class="input100" required>
                                <option value=null>Seleccione:</option>
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
                            </br>
                            <div class="container-login100-form-btn m-t-32">
                                <button onclick="return validaropera();" name="guardar" type="submit" class="login100-form-btn">ACEPTAR</button>
                            </div>
                        </div>                             
                    </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label>Usuarios Registrados</label>
                        <div class="tableWrap">
                            <table   class="table table-striped table-bordered table-hover scroll"   id="teq">
                                <thead>
                                    <tr >
                                        <th>Usuario</th>
                                        <th>Nombre</th>
                                        <th>Perfil</th>
                                        <th>Sede</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <?php 
                                    include 'conexion.php';
                                    $consult = "SELECT Usuario,Nombre,ApP,ApM,Perfil, Sede FROM Usuarios";
                                    $result = sqlsrv_query($conn,$consult);
                                    if (!$result) {
                                        die("Error: No se ejecutó la consulta");
                                    }
                                    while ($fila = sqlsrv_fetch_array($result)) {                                
                                        $nom = $fila['Nombre'];
                                        $app = $fila['ApP'];
                                        $apm = $fila['ApM'];
                                        $nombre = $nom.' '. $app.' '.$apm;
                                ?>
                                <tbody style="cursor: pointer;">
                                    <tr onclick="seleccionar(this,1);">
                                        <td id="user"><?php echo $fila['Usuario']; ?></td>
                                        <td><?php echo $nombre; ?></td>
                                        <td><?php echo $fila['Perfil']; ?></td>
                                        <td><?php echo $fila['Sede']; ?></td>
                                        <td > 
                                            <a href="edit.php?Usuario=<?php  $_SESSION['user'] = $fila['Usuario']; echo $_SESSION['user'];?>">&nbsp;&nbsp;<i class="fa fa-edit "></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="delete.php?Usuario=<?php echo $fila['Usuario'];?>" onclick="return confirmDel();"><i class="fa fa-trash-o "></i></a>                                        
                                        </td>
                                    </tr>
                                </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>                
                </div>   
            </div>
        </div>      
        <script type="text/javascript">
            function confirmDel(){
                var agree=confirm("¿Realmente desea eliminar al usuario seleccionado? ");
                if (agree) return true ;
                return false;
            }

            function operador(){
                operador = document.getElementById("opera");
                valor1 = document.getElementById("val1");
                valor2 = document.getElementById("val2");
                if (operador.checked) {
                    document.getElementById("content").style.display = 'block';
                    document.getElementById("admin").checked = false;
                    document.getElementById("content1").style.display = 'none';
                    if(valor1.checked || valor2.checked ){                    
                    }else{
                        return false;
                    }
                }
            }

            function validaropera() {
                operador = document.getElementById("opera");
                admin = document.getElementById("admin");
                valor1 = document.getElementById("val1");
                valor2 = document.getElementById("val2");
                if (document.form_01.sede.selectedIndex==0) {
                    alert("Debe seleccionar una sede.")
                    document.form_01.sede.focus()
                    return false;
                }
                if (operador.checked) {
                    document.getElementById("content").style.display = 'block';
                    document.getElementById("admin").checked = false;
                    document.getElementById("content1").style.display = 'none';
                    if(valor1.checked ||valor2.checked ){
                        return true;
                    }else{
                        alert("selecciona un perfil de operador");
                        return false;
                    }
                }else if (admin.checked){
                    document.getElementById("opera").checked = false;
                    document.getElementById("content").style.display = 'none';
                    document.getElementById("val1").checked = false;
                    document.getElementById("val2").checked = false;
                }else{
                    document.getElementById("content").style.display = 'none';
                    alert("selecciona un perfil para el usuario");
                    return false;
                }
            }

            function validar_check(){
                admin = document.getElementById("admin");
                if (admin.checked) {
                    document.getElementById("opera").checked = false;
                    document.getElementById("content").style.display = 'none';
                    document.getElementById("val1").checked = false;
                    document.getElementById("val2").checked = false;
                }else{

                }
            }
        </script>
        <script src="assets/js/jquery-1.10.2.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>      
        <script src="assets/js/custom.js"></script>
        <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="../vendor/animsition/js/animsition.min.js"></script>
        <script src="../vendor/bootstrap/js/popper.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../vendor/select2/select2.min.js"></script>
        <script src="../vendor/daterangepicker/moment.min.js"></script>
        <script src="../vendor/daterangepicker/daterangepicker.js"></script>
        <script src="../vendor/countdowntime/countdowntime.js"></script>
        <script src="../js/main.js"></script>  
    </body>
</html>
