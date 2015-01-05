<?php 
	/*
	 * Incluyo el modelo.php que contendrá la conexión a la base de datos, y será el padre de esta clase.
	 */
	require_once "model.php";

	class serviceModel extends Model{

		/*
		 * Constructor de la clase serviceModel el cual se conectará a la base de datos por medio del constructor del padre.
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * ------------------------------------------------------------------------------------------------------------
		 * 
		 * ----------------------------------------- CRUD SERVICIOS ---------------------------------------------------
		 * 
		 * ------------------------------------------------------------------------------------------------------------
		 */

		/*
		 * nción para insertar un servicio en la base de datos
		 */
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

		/*
		 * Función para actualizar un servicio en la base de datos
		 */
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

		/*
		 * Función para eliminar un servicios en la base de datos
		 */
		function delete_db_service($iid){

			//Creación de una consulta insertandole parametros para eliminar servicios
			$sentencia = $gbd->prepare("DELETE FROM Servicio WHERE idServicio = :id");
			$sentencia->bindParam(':id', $id);

			//Ejecución de la consulta
			$sentencia->execute();

		}

		/*
		 * Función para devolver todos los servicios de la base de datos
		 */
		function view_all_db_services(){

			$sentencia = $gbd->prepare("SELECT * FROM Servicio");
			$sentencia->execute();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}

			return $response;
		}

		/*
		 * Función para devolver un servicio en especifico de la base de datos
		 */
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