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
function datosUsuario($conexion,$email) {
	$consulta = "SELECT NOMBRE,NIF,APELLIDOS,EMAIL,FECHA_NACIMIENTO FROM USUARIOS WHERE EMAIL=:email";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->execute();
	
	return  $stmt->fetch();
}

	
 ?>
 
 <?php
	
	
 function datosMatriculaCliente($conexion,$email) {
 	$total_consulta = "SELECT COUNT(*) AS TOTAL FROM (SELECT m.fechainicio, m.fechafin, m.tipopago, o.nombre FROM MATRICULAS M 
    NATURAL JOIN OFERTAS O WHERE idcliente =  (SELECT idcliente FROM clientes WHERE clientes.correo =:email))";

    	$stmt = $conexion->prepare($total_consulta);
    	$stmt->bindParam(':email',$email);
		$stmt -> execute();
		$result = $stmt->fetch();
		$total = $result['TOTAL'];
		
		
	if ($total == 0) {
		echo "Debes matricularte en el gimnasio para ver tus matrículas";
		
	} else {
	$consulta = "SELECT m.fechainicio, m.fechafin, m.tipopago, o.nombre FROM MATRICULAS M 
    NATURAL JOIN OFERTAS O WHERE idcliente =  (SELECT idcliente FROM clientes WHERE clientes.correo =:email) ORDER BY m.idmatricula";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->execute();
	
	
		
    ?> <table> 
    	<tr>
    		<th>FECHA INICIO</th>
    		<th>FECHA FIN</th>
    		<th>TIPO PAGO</th>
    		<th>NOMBRE DE MATRÍCULA</th>
    	</tr>
    	<?php
	foreach ($stmt as $fila) {
	?> <tr>  <?php  ?> <td>  <?php echo $fila[0]; ?> </td>  <?php
					?> <td>  <?php echo $fila[1]; ?> </td>  <?php
					?> <td>  <?php echo $fila[2]; ?> </td>  <?php
					?> <td>  <?php echo $fila[3]; ?> </td>  <?php
					?>   <?php
	?> </tr>  <?php
     }
	
	?> </table> 
	<?php
} }  
 ?>


<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="css/Gym.css" />
    <link rel="stylesheet" type="text/css" href="css/area_clientes.css" />
	<script type="text/javascript" src="./js/boton.js"></script>
  <title>Gestión de biblioteca: Lista de Libros</title>
</head>

<body>

<?php

include_once ("cabecera.php");

include_once ("menu.php");

?>




<?php 
		$email = $_SESSION['login'];
		$conexion = crearConexionBD();
		$nombre_usuario = datosUsuario($conexion,$email);
		$nombre_matriculaCliente = datosMatriculaCliente($conexion,$email);
		cerrarConexionBD($conexion);	

?>

<h1 class="Areah">Aquí están tus datos:</h1>
<p class="datos">Nombre:  <?php echo $nombre_usuario['NOMBRE'];   ?></p>
<p class="datos">NIF:  <?php echo $nombre_usuario['NIF'];   ?></p>
<p class="datos">Apellidos:  <?php echo $nombre_usuario['APELLIDOS'];   ?></p>
<p class="datos">Email:  <?php echo $nombre_usuario['EMAIL'];   ?></p>
<p class="datos">Fecha de nacimiento:  <?php echo $nombre_usuario['FECHA_NACIMIENTO'];   ?></p>


</body>
</html>