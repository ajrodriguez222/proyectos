

<?php
	session_start();

	
	require_once("gestionBD.php");


	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["form_agregar_matricula"])) {
		// Recogemos los datos del formulario
		$nuevoUsuario["FECHAINICIO"] = $_REQUEST["FECHAINICIO"];
		$nuevoUsuario["FECHAFIN"] = $_REQUEST["FECHAFIN"];
		$nuevoUsuario["TIPOPAGO"] = $_REQUEST["TIPOPAGO"];
		$nuevoUsuario["IDCLIENTE"] = $_REQUEST["IDCLIENTE"];
		$nuevoUsuario["IDOFERTA"] = $_REQUEST["IDOFERTA"];
		
		
		// Guardar la variable local con los datos del formulario en la sesión.
		$_SESSION["form_agregar_matricula"] = $nuevoUsuario;		
	}
	else // En caso contrario, vamos al formulario
		Header("Location: form_alta_matricula.php");

?>


<?php
	

	require_once("gestionBD.php");
	require_once("gestionarUsuarios.php");
		
	// Comprobar que hemos llegado a esta página porque se ha rellenado el formulario
	if (isset($_SESSION["form_agregar_matricula"])) {
		$nuevoUsuario = $_SESSION["form_agregar_matricula"];
		$_SESSION["form_agregar_matricula"] = null;
	}
	else 
		Header("Location: form_alta_matricula.php");	

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
		
		<?php if (alta_matricula($conexion, $nuevoUsuario)) { 
		
		?>
				<h1>Matrícula insertada con éxito.</h1>
				<div >	
			   		Pulsa <a href="areaEmpleado.php">aquí</a> para acceder a tu área de empleado.
				</div>
		<?php } else { ?>
				<h1>La matrícula ya existe en la base de datos.</h1>
				<div >	
					Pulsa <a href="form_alta_matricula.php">aquí</a> para volver al formulario.
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

