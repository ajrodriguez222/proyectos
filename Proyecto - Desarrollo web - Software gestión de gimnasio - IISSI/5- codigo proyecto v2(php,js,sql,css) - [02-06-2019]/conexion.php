<?php
 $conexion = mysqli_connect('localhost', 'root', '');
 mysqli_select_db($conexion, 'prueba');
 $resultado = mysqli_query($conexion, "SELECT nombre, edad, genero FROM usuario");
 
 while ($fila = mysqli_fetch_array($resultado)) {
 	
 echo "Buenas" .$fila['nombre'].
    "<br>";
 }
 	
?>


