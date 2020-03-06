<?php
	session_start();
  	
  	include_once("gestionBD.php");
 	include_once("gestionarUsuarios.php");
	
	if (isset($_POST['submit'])){
		$email= $_POST['email'];
		$pass = $_POST['pass'];
		
		$conexion = crearConexionBD();
		$num_usuarios = consultarUsuario($conexion,$email,$pass);
		cerrarConexionBD($conexion);	
	
		if ($num_usuarios == 0){
			$login = "error";
			$NOM = "error";
		}
		else {
			$_SESSION['login'] = $email;
			Header("Location: index.php");
		}	
	}

?>
<?php
if (!isset($_SESSION["form_agregar_cliente"])) {
		$formulario['DNI'] = "";
		$formulario['NOMBRE'] = "";
		$formulario['APELLIDOS'] = "";
		$formulario['CORREO'] = "";
		$formulario['DIRECCION'] = "";
		$formulario['TELEFONO'] = "";

	
		$_SESSION["form_agregar_cliente"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["form_agregar_cliente"];
			
	// Si hay errores de validación, hay que mostrarlos y marcar los campos 
	
		
	// Creamos una conexión con la BD
	$conexion = crearConexionBD();
?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/Gym.css" />
  <link rel="stylesheet" type="text/css" href="css/Formulario.css" />
  <title>Gestión de clientes</title>
</head>

<body>
	
	<?php
		include_once("cabecera.php");
		include_once("menu.php");
	?>
	
	
	<form class="altaCliente" method="get" action="accion_alta_cliente.php">
		<img src="img/Gimnasio_century.png" class="avatar" alt="Avatar ">
		
		<fieldset><legend>Datos cliente</legend>
			<div></div><label for="DNI">DNI:<em>*</em></label>
			<input id="DNI" name="DNI" type="text" placeholder="12345678X" pattern="^[0-9]{8}[A-Z]" title="Ocho dígitos seguidos de una letra mayúscula" value="<?php echo $formulario['DNI'];?>" required>
			</div>

			<div><label for="NOMBRE">NOMBRE:<em>*</em></label>
			<input id="NOMBRE" name="NOMBRE" type="text" size="30" value="<?php echo $formulario['NOMBRE'];?>" required/>
			</div>

			<div><label for="APELLIDOS">APELLIDOS:</label>
			<input id="APELLIDOS" name="APELLIDOS" type="text" size="30" value="<?php echo $formulario['APELLIDOS'];?>"/>
			</div>


			<div><label for="CORREO">CORREO:<em>*</em></label>
			<input id="CORREO" name="CORREO"  type="email" placeholder="usuario@dominio.extension" value="<?php echo $formulario['CORREO'];?>" required/><br>
			</div>
			
			<div><label for="DIRECCION">DIRECCIÓN:<em>*</em></label>
			<input id="DIRECCION" name="DIRECCION" type="text" size="30" value="<?php echo $formulario['DIRECCION'];?>" required/>
			</div>
			
			<div></div><label for="TELEFONO">TELEFONO:<em>*</em></label>
			<input id="TELEFONO" name="TELEFONO" type="text" placeholder="687248725" pattern="^[0-9]{9}"  value="<?php echo $formulario['TELEFONO'];?>" required>
			</div>
			
			
		</fieldset>

	<input type="submit" value="Insertar Cliente" />
		

		
	</form>
	
	 <?php
		
		cerrarConexionBD($conexion);
	?>
	
	</body>
</html>
