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
		}
		else {
			$_SESSION['login'] = $email;
			Header("Location: index.php");
		}	
	}

?>







<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/Gym.css" />
	</head>

	<body>
	

	
<?php
include_once("cabecera.php");
?>

<?php 
include_once("menu.php");
?>

<video autoplay muted loop id="myVideo">
  <source src="img/fondo_Gym.mp4" type="video/mp4">
</video>
	



<?php if (!isset($_SESSION['login'])) {	?>
	
	 <div class="login-Gym">
      <img src="img/Gimnasio_century.png" class="avatar" alt="Avatar ">
      <h1>Iniciar Sesión</h1>
      <form  action="paginaPrincipal.php" method="post">
        <!-- USERNAME INPUT -->
        <label for="email">Email</label>
        <input type="text" name="email" id="email" placeholder="Introduce email">
        <!-- PASSWORD INPUT -->
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass" placeholder="Introduce contraseña">
        <input type="submit" name="submit" value="Entrar">
        ¿No estás registrado?<a id="Reg" href="form_alta_usuario.php">Regístrate aquí</a>
        <?php if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Error en la contraseña o no existe el usuario.";
		echo "</div>";
	}	
	?>
        
        </form>
       </div>
	
	
	
	
	
<?php } ?>


	<?php
	include_once("pie.php");
?>		
			
			

			

			<footer>
				<p>
			
				</p>
			</footer>
		</div>
	</body>
</html>
