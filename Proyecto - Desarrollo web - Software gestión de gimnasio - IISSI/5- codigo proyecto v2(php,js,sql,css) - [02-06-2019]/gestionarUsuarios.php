<?php
 	require_once("gestionBD.php");
 


 function alta_usuario($conexion,$usuario) {
	$fechaNacimiento = date('d/m/Y', strtotime($usuario["fechaNacimiento"]));

	try {
		$consulta = "CALL INSERTAR_USUARIO(:nif, :nombre, :ape, :fec, :email, :pass)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':nif',$usuario["nif"]);
		$stmt->bindParam(':nombre',$usuario["nombre"]);
		$stmt->bindParam(':ape',$usuario["apellidos"]);
		$stmt->bindParam(':fec',$fechaNacimiento);
		$stmt->bindParam(':email',$usuario["email"]);
		$stmt->bindParam(':pass',$usuario["pass"]);
		
		$stmt->execute();
		
		return true;
	
	} catch(PDOException $e) {
		return false;
    }
}
 
 
 
 
 function alta_cliente($conexion,$usuario) {
	

	try {
		$consulta = "INSERT INTO CLIENTES(DNI, NOMBRE, APELLIDOS, CORREO, DIRECCION, TELEFONO) VALUES (:dni, :nombre, :apellidos, :correo, :direccion, :telefono)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':dni',$usuario["DNI"]);
		$stmt->bindParam(':nombre',$usuario["NOMBRE"]);
		$stmt->bindParam(':apellidos',$usuario["APELLIDOS"]);
		$stmt->bindParam(':correo',$usuario["CORREO"]);
		$stmt->bindParam(':direccion',$usuario["DIRECCION"]);
		$stmt->bindParam(':telefono',$usuario["TELEFONO"]);
		
		$stmt->execute();
		
		return true;
	} catch(PDOException $e) {
		return false;

    }
}


  
  function alta_matricula($conexion,$usuario) {
		$fechaInicio = date('d/m/Y', strtotime($usuario["FECHAINICIO"]));
		$fechaFin = date('d/m/Y', strtotime($usuario["FECHAFIN"]));

	try {
		$consulta = "INSERT INTO MATRICULAS(FECHAINICIO, FECHAFIN, TIPOPAGO, IDCLIENTE, IDOFERTA) VALUES (:fechainicio, :fechafin, :tipopago, :idcliente, :idoferta)";
		$stmt=$conexion->prepare($consulta);
		$stmt->bindParam(':fechainicio',$fechaInicio);
		$stmt->bindParam(':fechafin',$fechaFin);
		$stmt->bindParam(':tipopago',$usuario["TIPOPAGO"]);
		$stmt->bindParam(':idcliente',$usuario["IDCLIENTE"]);
		$stmt->bindParam(':idoferta',$usuario["IDOFERTA"]);
		
		$stmt->execute();
		
		return true;
		
	} catch(PDOException $e) {
		return false;
    }
}
  
  
function listarClientes($conexion){
	try {
		$consulta = "SELECT * FROM CLIENTES";
		$stmt = $conexion->query($consulta);

		return $stmt;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}  
  
function listarOfertas($conexion){
	try {
		$consulta = "SELECT * FROM OFERTAS";
		$stmt = $conexion->query($consulta);

		return $stmt;
	} catch(PDOException $e) {
		return $e->getMessage();
    }
} 
  
  
function consultarUsuario($conexion,$email,$pass) {
 	$consulta = "SELECT COUNT(*) AS TOTAL FROM USUARIOS WHERE EMAIL=:email AND PASS=:pass";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':pass',$pass);
	$stmt->execute();
	return $stmt->fetchColumn();
}

