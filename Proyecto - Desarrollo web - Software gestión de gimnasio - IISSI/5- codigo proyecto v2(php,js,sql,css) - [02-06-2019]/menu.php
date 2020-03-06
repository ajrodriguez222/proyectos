<nav>
	<ul class="topnav" id="myTopnav">
		<li><a href="paginaPrincipal.php">Inicio</a></li>
		<li><a href="Tipos_de_clases.php">Tipos de clases</a></li>
		<li><a href="Horario.php">Horario</a></li>
		<li><a href="personal.php">Personal</a></li>
		<li><a href="instalaciones.php">Instalaciones</a></li>
		
 		  	
		<li><?php if (isset($_SESSION['login'])) {	?>
			<?php if ($_SESSION['login'] == 'admin@gmail.com') {    ?>
				<a href="areaEmpleado.php">Área Empleado</a>
			<?php } else {?>	
				<a href="areaCliente.php">Área Cliente</a>
			<?php }} ?>
		</li>
		
		<li><?php if (isset($_SESSION['login'])) {	?>
				<a href="logout.php">Desconectar</a>
			<?php } ?>
		</li>
			
		
		<li class="icon">
			<a href="javascript:void(0);" onclick="myToggleMenu()">&#9776;</a>
		</li>	
	</ul>
</nav>
