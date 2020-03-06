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
if (!isset($_SESSION["form_agregar_matricula"])) {
		$formulario['FECHAINICIO'] = "";
		$formulario['FECHAFIN'] = "";
		$formulario['TIPOPAGO'] = "";
		$formulario['IDCLIENTE'] = "";
		$formulario['IDOFERTA'] = "";
		

	
		$_SESSION["form_agregar_matricula"] = $formulario;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$formulario = $_SESSION["form_agregar_matricula"];
			
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
  <title>Gestión de matriculas</title>
</head>

<body>
	
	<?php
		include_once("cabecera.php");
		include_once("menu.php");
	?>
	
	
	<form class="altaMatricula" method="get" action="accion_alta_matricula.php">
		<img src="img/Gimnasio_century.png" class="avatar" alt="Avatar ">
		
		<fieldset><legend>Datos matricula</legend>
			
			
			<div<<label for="FECHAINICIO">FECHAINICIO:</label>
			<input type="date" id="FECHAINICIO" required name="FECHAINICIO" value="<?php echo $formulario['FECHAINICIO'];?>"/>
			</div>
			
			<div<<label for="FECHAFIN">FECHAFIN:</label>
			<input type="date" id="FECHAFIN" required name="FECHAFIN" value="<?php echo $formulario['FECHAFIN'];?>"/>
			</div>
			

			<div><label for="pagos">Selecciona tipo de pago<em>*</em></label>
				<select multiple name="TIPOPAGO" id="pagos" required>
					<option value="tarjeta">Tarjeta</option>
					<option value="metalico">Metálico</option>
				</select>
			</div>
			


			
			
			
			<div><label for="clientes">Selecciona cliente<em>*</em></label>
				<select multiple name="IDCLIENTE" id="clientes" required>
					<?php
						$clientes = listarClientes($conexion);
						
				  		foreach($clientes as $cliente) {
				  			
				  			if(in_array($cliente["IDCLIENTE"], $formulario['IDCLIENTE'])){ 
								echo "<option value='".$cliente["IDCLIENTE"]."' label=' (".$cliente["DNI"].") ".$cliente["NOMBRE"]." ".$cliente["APELLIDOS"]."' selected/>";
							}else{
								echo "<option value='".$cliente["IDCLIENTE"]."' label='(".$cliente["DNI"].") ".$cliente["NOMBRE"]." ".$cliente["APELLIDOS"]."'/>";
							}
						}
					?>
				</select>
			</div>
			
			<div><label for="ofertas">Selecciona oferta<em>*</em></label>
				<select multiple name="IDOFERTA" id="ofertas" required>
					<?php
						$ofertas = listarOfertas($conexion);
						
				  		foreach($ofertas as $oferta) {
				  			
				  			if(in_array($oferta["IDOFERTA"], $formulario['IDOFERTA'])){ 
								echo "<option value='".$oferta["IDOFERTA"]."' label=' (".$oferta["PRECIO"]."€) ".$oferta["NOMBRE"]."' selected/>";
							}else{
								echo "<option value='".$oferta["IDOFERTA"]."' label='(".$oferta["PRECIO"]."€) ".$oferta["NOMBRE"]."'/>";
							}
						}
					?>
				</select>
			</div>
			
		</fieldset>

	<input type="submit" value="Insertar Matricula" />
		

		
	</form>
	
	 <?php
		
		cerrarConexionBD($conexion);
	?> 
	
	</body>
</html>
