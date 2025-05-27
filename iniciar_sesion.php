<?php	
  	function write_visita (){
		$new_ip=get_client_ip();
  	}

	//Obtiene la IP del cliente
	function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
    $candado="NO";
	if(isset($_POST['candado'])){
		$candado = $_POST['candado'];
	} 
    if ($candado==="NO") {		
		echo'<script type="text/javascript">;
			alert("Al Modulo de Captura, Debes de Iniciar por el Login");
			location.href="cerrar_sesion.php";
			window.close();
			</script>';
  	}
	//Llamamos a la función, y ella hace todo :)
	//write_visita ();

	//Obtiene la IP del cliente
	include 'conexion.php';
	$usuario = $_POST['username'];
	$password = $_POST['password'];
	$sqlselect = "SELECT Usuario, Password FROM Usuarios WHERE Usuario = '$usuario'";
	$resulselect = SQLSRV_QUERY($conn,$sqlselect);
	$recorreselect = SQLSRV_FETCH_ARRAY($resulselect, SQLSRV_FETCH_ASSOC);
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
   		if ($recorreselect['Usuario'] == $usuario) {
			if($recorreselect['Password'] == $password){
				$_SESSION['loginudeg'] = $usuario;
				$sqlstart = "SELECT Perfil FROM Usuarios WHERE Usuario = '$usuario'";
				$resultadostart = SQLSRV_QUERY($conn,$sqlstart);
				$recorrefila = SQLSRV_FETCH_ARRAY($resultadostart, SQLSRV_FETCH_ASSOC);
				$recorre = implode("\t", $recorrefila);
				$recorretodo = str_split($recorre);
				if(in_array("A", $recorretodo)){
					$_SESSION['loginudeg'] = $_POST['username'];
					$new_ip=get_client_ip();
					$_SESSION['IP'] = $new_ip;
					$_SESSION['administradorudeg'] = 'A';
					echo'<script type="text/javascript">
						alert("Bienvenido");
						window.location.href="admin/inicioadmin.php"
						</script>';
				}
				if(in_array("C", $recorretodo)){
					$_SESSION['loginudeg'] = $_POST['username'];
					$_SESSION['capturaudeg'] = 'C';
					$new_ip=get_client_ip();
					$_SESSION['IP'] = $new_ip;
					echo'<script type="text/javascript">
						alert("Bienvenido");
						window.location.href="Inicio.php"
						</script>';
				}
				if(in_array("S", $recorretodo)){
					session_unset();
					echo'<script type="text/javascript">
						alert("Bienvenido, pero NO TIENES ATRIBUTOS PARA OPERAR");
						window.location.href="Login.php"
						</script>';
				}
			} else {				
				echo'<script type="text/javascript">
				alert("Contraseña Incorrecta");
				window.location.href="Login.php"
				</script>';		
			}		
		} else {
			echo'<script type="text/javascript">
        	alert("Usuario Incorrecto");
        	window.location.href="Login.php"
            </script>';	
		}		
	} else {
        //enviarPost("cerrar_sesion.php", { dato1: "valor1", dato2: "valor2" });
		session_unset();
		echo'<script type="text/javascript">
        	alert("Existe una sesion Activo, favor de volver a Firmar");
        	window.location.href="cerrar_sesion.php"
            </script>';	
	}
?>
<!DOCTYPE html>
<html lang="es">
    <head>   
    </head>
    <body>
    <script>
        function enviarPost(url, datos) {
            // Crear un formulario en memoria
            let form = document.createElement("form");
            form.method = "POST";
            form.action = url;
            form.style.display = "none"; // Ocultar el formulario

            // Agregar los datos como campos ocultos
            for (let clave in datos) {
                let input = document.createElement("input");
                input.type = "hidden";
                input.name = clave;
                input.value = datos[clave];
                form.appendChild(input);
            }

            // Agregar el formulario al documento y enviarlo
            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
</script>
    </body>
</html>