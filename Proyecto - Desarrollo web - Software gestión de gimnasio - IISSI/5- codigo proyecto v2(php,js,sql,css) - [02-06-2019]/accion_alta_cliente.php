


<?php
	session_start();

	
	require_once("gestionBD.php");

	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["form_agregar_cliente"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["DNI"] = $_REQUEST["DNI"];
		$nuevoUsuario["NOMBRE"] = $_REQUEST["NOMBRE"];
		$nuevoUsuario["APELLIDOS"] = $_REQUEST["APELLIDOS"];
		$nuevoUsuario["CORREO"] = $_REQUEST["CORREO"];
		$nuevoUsuario["DIRECCION"] = $_REQUEST["DIRECCION"];
		$nuevoUsuario["TELEFONO"] = $_REQUEST["TELEFONO"];
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["form_agregar_cliente"] = $nuevoUsuario;		
	}
	else // En caso contrario, vamos al formulario
		Header("Location: form_alta_cliente.php");
?>


<?php
	

	require_once("gestionBD.php");
	require_once("gestionarUsuarios.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["form_agregar_cliente"])) {
		$nuevoUsuario = $_SESSION["form_agregar_cliente"];
		$_SESSION["form_agregar_cliente"] = null;
	}
	else 
		Header("Location: form_alta_cliente.php");	

	$conexion = crearConexionBD(); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Gestión de Gimnasio: Alta de Usuario realizada con éxito</title>
	<link rel="stylesheet" type="text/css" href="css/Gym.css" />
</head>

<body>
	<?php
		include_once("cabecera.php");
		include_once("menu.php");
	?>

	<main>
		<?php if (alta_cliente($conexion, $nuevoUsuario)) { 
		
		?>
				<h1><?php echo $nuevoUsuario["NOMBRE"]; ?>, insertado con éxito.</h1>
				<div >	
			   		Pulsa <a href="areaEmpleado.php">aquí</a> para acceder a tu área de empleado.
				</div>
		<?php } else { ?>
				<h1>El cliente ya existe en la base de datos.</h1>
				<div >	
					Pulsa <a href="form_alta_cliente.php">aquí</a> para volver al formulario.
				</div>
		<?php } ?>

	</main>

	<?php
		include_once("pie.php");
	?>
</body>
</html>
<?php
	cerrarConexionBD($conexion);
?>

