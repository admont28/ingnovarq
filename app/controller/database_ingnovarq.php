<?php
$dbconfig = array(
	'host' => 'localhost',
	'port' => '3306',
	'user' => 'UserIng',
	'pass' => 'IngnovarqSAS2015',
	'dbname' => 'ingnovar_Ingnovarq'
);


//Funcion para realizar la conexión a la base de datos
function database_nice() {
	|
	global $dbconfig;
	try {
    	$gbd = new PDO('mysql:host='.$dbconfig['host'].';dbname='.$dbconfig['dbname'],
			$dbconfig['user'], $dbconfig['pass']);
	} catch (PDOException $e) {
	    echo 'Falló la conexión: ' . $e->getMessage();
	}

}

/* ---Funciones para realizar el CRUD de los usuarios del sistema--- */

//Función para insertar un usuario en la base de datos
function insert_db_user($cedula, $nombre, $apellido, $password, $isSuperAdmin){

	//Obtener la fecha del sistema
	$fecha= getDate();
	$fecha_db=$fecha1['year']."-".$fecha1['mon']."-".$fecha1['mday'];

	//Creación de una consulta insertandole parametros para agregar usuarios
	$sentencia = $gbd->prepare("INSERT INTO Usuario (cedulaUsuario, nombreUsuario, apellidoUsuario, passwordUsuario, fechaCreacionUsuario, superAdminUsuario) VALUES (:cedula, :nombre, :apellido, :password, :fecha, :super_admin)");
	$sentencia->bindParam(':cedula', $cedula);
	$sentencia->bindParam(':nombre', $nombre);
	$sentencia->bindParam(':apellido', $apellido);
	$sentencia->bindParam(':password', $password);
	$sentencia->bindParam(':fecha', $fecha_db);
	$sentencia->bindParam(':super_admin', $isSuperAdmin);

	//Ejecución de la consulta
	$sentencia->execute();
}

//Función para actualizar un usuario en la base de datos
function update_db_user($cedula, $nombre, $apellido, $password, $fecha, $isSuperAdmin){

	//Creación de una consulta insertandole parametros para actualizar usuarios
	$sentencia = $gbd->prepare("UPDATE Usuario SET cedulaUsuario = :cedula, nombreUsuario = :nombre, apellidoUsuario = :apellido, passwordUsuario = :password, fechaCreacionUsuario = :fecha, superAdminUsuario = :super_admin");
	$sentencia->bindParam(':cedula', $cedula);
	$sentencia->bindParam(':nombre', $nombre);
	$sentencia->bindParam(':apellido', $apellido);
	$sentencia->bindParam(':password', $password);
	$sentencia->bindParam(':fecha', $fecha_db);
	$sentencia->bindParam(':super_admin', $isSuperAdmin);

	//Ejecución de la consulta
	$sentencia->execute();
}

//Función para eliminar un usuario en la base de datos
function delete_db_user($cedula){

	//Creación de una consulta insertandole parametros para eliminar usuarios
	$sentencia = $gbd->prepare("DELETE FROM Usuario WHERE cedulaUsuario = :cedula");
	$sentencia->bindParam(':cedula', $cedula);

	//Ejecución de la consulta
	$sentencia->execute();

}

//Función para devolver todos los usuarios de la base de datos
function view_db_users(){

	$sentencia = $gbd->prepare("SELECT * FROM Usuario");
	$sentencia->execute();

	while ($fila = $sentencia->fetch()) {
		//echo "<p>".$fila['nombre']."</p>";   	
		//print_r($fila);
		$response[] = $fila;
	}

	return $response;
}

//Función para devolver un usuario en especifico de la base de datos
function view_db_user($cedula){

	//Creación de una consulta insertandole parametros para obtener un usuario en especifico
	$sentencia = $gbd->prepare("SELECT * FROM Usuario where cedulaUsuario = :cedula");
	$sentencia->bindParam(':cedula', $cedula);

	$sentencia->execute();

	while ($fila = $sentencia->fetch()) {
		//echo "<p>".$fila['nombre']."</p>";   	
		//print_r($fila);
		$response[] = $fila;
	}

	return $response;
}


/* ---Funciones para realizar el CRUD de los proyectos de Ingnovarq SAS--- */

//Función para insertar un proyecto en la base de datos
function insert_db_project($nombre, $descripcion, $fecha, $usuario){

	//Creación de una consulta insertandole parametros para agregar proyectos
	$sentencia = $gbd->prepare("INSERT INTO Proyecto (nombreProyecto, descripcionProyecto, fechaCreacionProyecto, Usuario_idUsuario) VALUES (:nombre, :descripcion, :fecha, :usuario)");
	$sentencia->bindParam(':nombre', $nombre);
	$sentencia->bindParam(':descripcion', $descripcion);
	$sentencia->bindParam(':fecha', $fecha);
	$sentencia->bindParam(':usuario', $usuario);


	//Ejecución de la consulta
	$sentencia->execute();
}

//Función para actualizar un proyecto en la base de datos
function update_db_project($nombre, $descripcion, $fecha, $usuario){

	//Creación de una consulta insertandole parametros para actualizar proyectos
	$sentencia = $gbd->prepare("UPDATE Proyecto SET nombreProyecto = :nombre, descripcionProyecto = :descripcion, fechaCreacionProyecto = :fecha, Usuario_idUsuario = :usuario");
	$sentencia->bindParam(':nombre', $nombre);
	$sentencia->bindParam(':descripcion', $descripcion);
	$sentencia->bindParam(':fecha', $fecha);
	$sentencia->bindParam(':usuario', $usuario);

	//Ejecución de la consulta
	$sentencia->execute();
}

//Función para eliminar un proyecto de la base de datos
function delete_db_project($iid){

	//Creación de una consulta insertandole parametros para eliminar proyectos
	$sentencia = $gbd->prepare("DELETE FROM Proyecto WHERE idProyecto = :id");
	$sentencia->bindParam(':id', $id);

	//Ejecución de la consulta
	$sentencia->execute();

}

//Función para devolver todos los proyectos de la base de datos
function view_db_projects(){

	$sentencia = $gbd->prepare("SELECT * FROM Proyecto");
	$sentencia->execute();

	while ($fila = $sentencia->fetch()) {
		$response[] = $fila;
	}

	return $response;
}

//Función para devolver un proyecto en especifico de la base de datos
function view_db_project($idProyecto){

	//Creación de una consulta insertandole parametros para obtener un proyecto en especifico
	$sentencia = $gbd->prepare("SELECT * FROM Proyecto where idProyecto = :id");
	$sentencia->bindParam(':id', $idProyecto);

	$sentencia->execute();

	while ($fila = $sentencia->fetch()) {
		$response[] = $fila;
	}

	return $response;
}

/* --Funciones para la realización del CRUD de los servicios de Ingnovarq SAS*/

//Función para insertar un servicio en la base de datos
function insert_db_service($nombre, $descripcion, $fecha, $usuario){

	//Creación de una consulta insertandole parametros para agregar servicios
	$sentencia = $gbd->prepare("INSERT INTO Servicio (nombreServicio, descripcionServicio, fechaCreacionServicio, Usuario_idUsuario) VALUES (:nombre, :descripcion, :fecha, :usuario)");
	$sentencia->bindParam(':nombre', $nombre);
	$sentencia->bindParam(':descripcion', $descripcion);
	$sentencia->bindParam(':fecha', $fecha);
	$sentencia->bindParam(':usuario', $usuario);


	//Ejecución de la consulta
	$sentencia->execute();
}

//Función para actualizar un servicio en la base de datos
function update_db_service($nombre, $descripcion, $fecha, $usuario){

	//Creación de una consulta insertandole parametros para actualizar servicios
	$sentencia = $gbd->prepare("UPDATE Servicio SET nombreServicio = :nombre, descripcionServicio = :descripcion, fechaCreacionServicio = :fecha, Usuario_idUsuario = :usuario");
	$sentencia->bindParam(':nombre', $nombre);
	$sentencia->bindParam(':descripcion', $descripcion);
	$sentencia->bindParam(':fecha', $fecha);
	$sentencia->bindParam(':usuario', $usuario);

	//Ejecución de la consulta
	$sentencia->execute();
}

//Función para eliminar un servicios en la base de datos
function delete_db_service($iid){

	//Creación de una consulta insertandole parametros para eliminar servicios
	$sentencia = $gbd->prepare("DELETE FROM Servicio WHERE idServicio = :id");
	$sentencia->bindParam(':id', $id);

	//Ejecución de la consulta
	$sentencia->execute();

}

//Función para devolver todos los servicios de la base de datos
function view_db_services(){

	$sentencia = $gbd->prepare("SELECT * FROM Servicio");
	$sentencia->execute();

	while ($fila = $sentencia->fetch()) {
		$response[] = $fila;
	}

	return $response;
}

//Función para devolver un servicio en especifico de la base de datos
function view_db_service($idServicio){

	//Creación de una consulta insertandole parametros para obtener un servicio en especifico
	$sentencia = $gbd->prepare("SELECT * FROM Servicio where idServicio = :id");
	$sentencia->bindParam(':id', $idServicio);

	$sentencia->execute();

	while ($fila = $sentencia->fetch()) {
		$response[] = $fila;
	}

	return $response;
}

?>