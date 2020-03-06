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
 <html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/Gym.css" />
    <link rel="stylesheet" type="text/css" href="css/area_clientes.css" />
	<script type="text/javascript" src="./js/boton.js"></script>
  <title>Gestión área empleado</title>
</head>

<body>
 
<?php

include_once ("cabecera.php");

include_once ("menu.php");

?>

<p>Pulsa<a href="form_alta_cliente.php">aquí</a>para insertar un cliente.</p>
<p>Pulsa<a href="form_alta_matricula.php">aquí</a>para insertar una matrícula.</p>

<h1>Listado de clientes</h1>
<?php 
 function datosClientes($conexion) {
	$consulta = "SELECT DNI, NOMBRE, APELLIDOS, CORREO, DIRECCION, TELEFONO FROM CLIENTES ORDER BY DNI ";
	$stmt = $conexion->prepare($consulta);
	$stmt->execute();
	
    ?> <table> 
    	<tr>
    		<th>DNI</th>
    		<th>NOMBRE</th>
    		<th>APELLIDOS</th>
    		<th>CORREO</th>
    		<th>DIRECCION</th>
    		<th>TELEFONO</th>
    	</tr>
    	<?php
	foreach ($stmt as $fila) {
	?> <tr>  <?php  ?> <td>  <?php echo $fila["DNI"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["NOMBRE"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["APELLIDOS"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["CORREO"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["DIRECCION"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["TELEFONO"]; ?> </td>   <?php
	?> </tr>  <?php
	
}
	
	?> </table> <?php
}

		$conexion = crearConexionBD();
		$nombre_cliente = datosClientes($conexion);
		cerrarConexionBD($conexion);	
	
	
 ?>

<h1>listado de matriculas</h1>
<?php
function datosMatricula($conexion) {
	$consulta = "SELECT DNI, NOMBRE, APELLIDOS, CORREO, FECHAINICIO,FECHAFIN, TIPOPAGO FROM CLIENTES NATURAL JOIN MATRICULAS ORDER BY DNI, FECHAINICIO";
	$stmt = $conexion->prepare($consulta);
	$stmt->execute();
	

    ?> <table> 
    	<tr>
    		<th>DNI</th>
    		<th>NOMBRE</th>
    		<th>APELLIDOS</th>
    		<th>CORREO</th>
    		<th>FECHA INICIO</th>
    		<th>FECHA FIN</th>
    		<th>TIPO DE PAGO</th>
    	</tr>
    	<?php
	foreach ($stmt as $fila) {
	?> <tr>  <?php  ?> <td>  <?php echo $fila["DNI"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["NOMBRE"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["APELLIDOS"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["CORREO"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["FECHAINICIO"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["FECHAFIN"]; ?> </td>  <?php
					?> <td>  <?php echo $fila["TIPOPAGO"]; ?> </td>  <?php
	?> </tr>  <?php
	
}
	
	?> </table> <?php
}

		$conexion = crearConexionBD();
		$nombre_matricula = datosMatricula($conexion);
		cerrarConexionBD($conexion);	
	
	
 ?>
 
 
</html>  
 

 