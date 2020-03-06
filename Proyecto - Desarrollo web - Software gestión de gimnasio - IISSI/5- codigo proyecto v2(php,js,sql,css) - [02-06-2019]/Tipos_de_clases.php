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

<?php 
require_once 'menu.php';

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<link rel="stylesheet" href="tipodeclase1.css">
		<link rel="stylesheet" href="css/Gym.css">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Century Fitness | Tipo de Clases</title>
		<meta name="description" content="">
		<meta name="author" content="Antonio Rodriguez">
		
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		
		
	</head>
	
	<body>
		<div>
			<header>
				<h1 class="Tipodeclase_cabecera">Tipo de Clases Century Fitness</h1>
			</header>
			<p class="Tip">
				<img class="TipoDeClasesl" src="https://statics-cuidateplus.marca.com/sites/default/files/images/zumba.jpg" alt="Zumba" title="Zumba" />
				<span class="Tip2">
				<span class="spa">Objetivo Zumba:</span>
				<em class="em">En esta clase aumenta la actividad cardiovascular, favoreciendo que se quemen más calorías, y se incorporan movimientos que definen las piernas y los abdominales.</em>
				</span>
				<br />
				
</p>
<p class="Tip">
				<img class="TipoDeClasel" src="http://newhercules.com/wp-content/uploads/2015/09/FLEX-TRX-color-360x240@2x.jpg" alt="TRX" title="TRX"/>
				<span class="Tip2">
				<span class="spa">Objetivo TRX:</span>
				<em class="em">desarrolla la fuerza funcional al mismo tiempo que mejora la flexibilidad, el equilibrio y la estabilidad de la parte central (core) del cuerpo.</em>
				</span>
				<br />
				
			</p>
            <p class="Tip">
				<img class="TipoDeClasel" src="http://www.miningpress.com/media/img/00_spinning_17354.jpg" alt="Spining" title="Spining"/>
				<span class="Tip2">
				<span class="spa">Objetivo Spining:</span>
				<em class="em">hacer trabajar cada músculo del cuerpo con la misma sincronía del compás y el ejercicio.</em>
				</span>
				<br />
				
			</p>
            <p class="Tip">
				<img class="TipoDeClasel" src="https://www.elementbox.es/wp-content/uploads/2015/02/boxeo-gimnasio-550x400.jpg" alt="Boxeo" title="Boxeo"/>
				<span class="Tip2">
				<span class="spa">Objetivo Boxeo:</span>
				<em class="em">Este deporte aporta múltiples beneficios tanto físicos como psíquicos. Aúna ejercicio aeróbico con actividades que potencian la fuerza y la resistencia.</em>
				</span>
				<br />
				
			</p>
            <p class="Tip">
				<img class="TipoDeClasel" src="https://apiblog.bewe.co/wp-content/uploads/2019/02/profesor-de-pilates.png" alt="Pilates" title="Pilates"/>
				<span class="Tip2">
				<span class="spa">Objetivo Pilates:</span>
				<em class="em">Es un deporte en el que se trabajan el cuerpo y la mente, y cuyos objetivos principales son reforzar la musculatura, aumentar la fuerza y la flexibilidad del cuerpo y mejorar la capacidad de concentración.</em>
				</span>
				<br />
				
			</p>
              <p class="Tip">
				<img class="TipoDeClasel" src="https://guiafitness.com/wp-content/uploads/gap-que-ejercicios-debes-conocer-para-iniciarte-en-este-deporte.jpg" alt="GAP" title="GAP"/>
				<span class="Tip2">
				<span class="spa">Objetivo GAP:</span>
				<em class="em">La clase de GAP es una clase colectiva de tonificación específica para trabajar glúteos, abdomen y piernas. En las sesiones de GAP se trabajan estos grupos musculares de forma aislada durante 25-30 minutos para aumentar su eficacia.</em>
				</span>
				<br />
				
			</p>
            
            