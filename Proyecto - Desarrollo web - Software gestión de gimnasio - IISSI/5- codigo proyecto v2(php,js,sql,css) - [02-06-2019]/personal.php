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
<html lang="es">
	<head>
		<link rel="stylesheet" href="css/personal1.css">
		<link rel="stylesheet" type="text/css" href="css/Gym.css" />
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Century Fitness | Personal</title>
		<meta name="description" content="">
		<meta name="author" content="Fran Zájara">
		
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		
		
	</head>
	
	<body>
		<?php 
		require("menu.php");
		?>
		<div>
			<p class="Per">
				<img class="Personal" src="img/Director.JPG" alt="Director" title="Director" />
				<span class="Per2">
				<span class="spa">Objetivo:</span>
				<em class="em">Control de todo el personal del gimnasio y de los pagos.</em>
				</span>
				<br />
				<span class="spa"> Castillo Daza | Director </span>
			</p>
			<p class="Per">
				<img class="Personal" src="img/Coordinador.JPG" alt="Coordinador" title="Coordinador"/>
				<span class="Per2">
				<span class="spa">Objetivo:</span>
				<em class="em">Ayudar con la planificación que proporciona el director.</em>
				</span>
				<br />
				<span class="spa">Fernando Barba Ruiz | Coordinador</span>
			</p>
			<p class="Per">
				<img class="Personal" src="img/Recepcionista.jpg" alt="Recepcionista" title="Recepcionista" />
				<span class="Per2">
				<span class="spa">Objetivo:</span>
				<em class="em">Atender a los clientes que acudan a recepción.</em>
				</span>
				<br />
				<span class="spa">María Núñez Sánchez | Recepcionista</span>
				
			</p>
			<p class="Per">
				<img class="Personal" src="img/Fisioterapeuta.jpg" alt="Fisioterapeuta" title="Fisioterapeuta"/>
				<span class="Per2">
				<span class="spa">Objetivo:</span>
				<em class="em">Atender a los clientes que sufran de una lesión.</em>
				</span>
				<br />
				<span class="spa">Rocío López Benítez | Fisioterapeuta</span>
			</p>
			<p class="Per">
				<img class="Personal" src="img/Monitor.jpg" alt="Monitor" title="Monitor"/>
				<span class="Per2">
				<span class="spa">Objetivo:</span>
				<em class="em">Ayudar con la alimentación y el entrenamiento de los clientes.</em>
				</span>
				<br />
				<span class="spa">Raúl Santos Ramirez | Monitor	</span>
			</p>
			<p class="Per">
				<img class="Personal" src="img/Monitora.jpg" alt="Monitora" title="Monitora"/>
				<span class="Per2">
				<span class="spa">Objetivo:</span>
				<em class="em">Ayudar con la alimentación y el entrenamiento de los clientes.</em>
				</span>
				<br />
				<span class="spa">Natalia Fernández Plaza | Monitora</span>	
			</p>
			<p class="Per">
				<img class="Personal" src="img/Limpiador.jpg" alt="Limpiador" title="Limpiador"/>
				<span class="Per2">
				<span class="spa">Objetivo:</span>
				<em class="em">Limpiar el gimnasio.</em>
				</span>
				<br />
				<span class="spa">Jorge Carrillo Ruiz | Limpiador</span>
			</p>
			<footer>
				<p class="Per">
					2019&copy; Proyecto Gimnasio
				</p>
			</footer>
		</div>
	</body>
</html>
