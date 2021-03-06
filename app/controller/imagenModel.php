<?php
	/*
	 * Incluyo el modelo.php que contendrá la conexión a la base de datos, y será el padre de esta clase.
	 */
	require_once ("model.php");

	class ImagenModel extends Model{

		/*
		 * Constructor de la clase imagenModel el cual se conectará a la base de datos por medio del constructor del padre.
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * ------------------------------------------------------------------------------------------------------------
		 * 
		 * ----------------------------------------- CRUD IMAGENES  ---------------------------------------------------
		 * 
		 * ------------------------------------------------------------------------------------------------------------
		 */

		/*
		 * Función para insertar imagenes de un proyecto
		 */
		function insert_images_project($ruta, $titulo, $idProyecto){

			$sentencia = $this->_db->prepare("INSERT INTO Imagen (rutaImagen, tituloImagen, sliderImagen, Proyecto_idProyecto) VALUES (:ruta, :titulo, false, :idProyecto)");
			$sentencia->bindParam(':ruta', $ruta);
			$sentencia->bindParam(':titulo', $titulo);
			$sentencia->bindParam(':idProyecto', $idProyecto);
			//Ejecución de la consulta
			return $sentencia->execute();
		}

		/*
		 * Función para insertar imagenes de un servicio
		 */
		function insert_images_service($ruta, $titulo, $idServicio){

			$sentencia = $this->_db->prepare("INSERT INTO Imagen (rutaImagen, tituloImagen, sliderImagen, Servicio_idServicio) VALUES (:ruta, :titulo, false, :idServicio)");
			$sentencia->bindParam(':ruta', $ruta);
			$sentencia->bindParam(':titulo', $titulo);
			$sentencia->bindParam(':idServicio', $idServicio);
			//Ejecución de la consulta
			return $sentencia->execute();
		}

		/*
		 * Función para insertar imagenes de un cliente
		 */
		function insert_image_client($ruta, $titulo, $idCliente){

			$sentencia = $this->_db->prepare("INSERT INTO Imagen (rutaImagen, tituloImagen, sliderImagen, Cliente_idCliente) VALUES (:ruta, :titulo, false, :idCliente)");
			$sentencia->bindParam(':ruta', $ruta);
			$sentencia->bindParam(':titulo', $titulo);
			$sentencia->bindParam(':idCliente', $idCliente);
			//Ejecución de la consulta
			return $sentencia->execute();
		}

		function delete_db_images_service($idServicio){

			//Creación de una consulta insertandole parametros para eliminar
			$sentencia = $this->_db->prepare("DELETE FROM Imagen WHERE Servicio_idServicio = :idServicio");
			$sentencia->bindParam(':idServicio', $idServicio);

			//Ejecución de la consulta
			$sentencia->execute();

		}

		function delete_db_images_client($idCliente){

			//Creación de una consulta insertandole parametros para eliminar
			$sentencia = $this->_db->prepare("DELETE FROM Imagen WHERE Cliente_idCliente = :idCliente");
			$sentencia->bindParam(':idCliente', $idCliente);

			//Ejecución de la consulta
			$sentencia->execute();

		}

		function delete_db_images_project($idProyecto){

			//Creación de una consulta insertandole parametros para eliminar
			$sentencia = $this->_db->prepare("DELETE FROM Imagen WHERE Proyecto_idProyecto = :idproyecto");
			$sentencia->bindParam(':idProyecto', $idProyecto);

			//Ejecución de la consulta
			return $sentencia->execute();

		}

		function delete_db_image_project($idProyecto, $rutaImagen){
			
			//Creación de una consulta insertandole parametros para eliminar
			$sentencia = $this->_db->prepare("DELETE FROM Imagen WHERE Proyecto_idProyecto = :idProyecto AND rutaImagen = :rutaImagen");
			$sentencia->bindParam(':idProyecto', $idProyecto);
			$sentencia->bindParam(':rutaImagen', $rutaImagen);

			//Ejecución de la consulta
			$result=$sentencia->execute();
			

		}

		function delete_db_image_service($idServicio, $rutaImagen){

			//Creación de una consulta insertandole parametros para eliminar
			$sentencia = $this->_db->prepare("DELETE FROM Imagen WHERE Servicio_idServicio = :idServicio AND rutaImagen = :rutaImagen");
			$sentencia->bindParam(':idServicio', $idServicio);
			$sentencia->bindParam(':rutaImagen', $rutaImagen);

			//Ejecución de la consulta
			$sentencia->execute();

		}

		function delete_db_image_client($idCliente, $rutaImagen){

			//Creación de una consulta insertandole parametros para eliminar
			$sentencia = $this->_db->prepare("DELETE FROM Imagen WHERE Cliente_idCliente = :idCliente AND rutaImagen = :rutaImagen");
			$sentencia->bindParam(':idCliente', $idCliente);
			$sentencia->bindParam(':rutaImagen', $rutaImagen);

			//Ejecución de la consulta
			return $sentencia->execute();

		}

		function view_images_db_project($idProyecto){

			$sentencia = $this->_db->prepare("SELECT * FROM Imagen WHERE Proyecto_idProyecto = :idProyecto");
			$sentencia->bindParam('idProyecto', $idProyecto);
			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}

			return $response;
		}

		function view_images_db_service($idServicio){

			$sentencia = $this->_db->prepare("SELECT * FROM Imagen WHERE Servicio_idServicio = :idServicio");
			$sentencia->bindParam('idServicio', $idServicio);
			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}

			return $response;
		}

		function view_image_db_client($idCliente){

			$sentencia = $this->_db->prepare("SELECT * FROM Imagen WHERE Cliente_idCliente = :idCliente");
			$sentencia->bindParam('idCliente', $idCliente);
			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			if(sizeof($response) != 0)
				return $cliente = $response[0];
			return null;
		}

		function update_db_path_image($rutaImagen, $idImagen){
			$sentencia = $this->_db->prepare("UPDATE Imagen SET rutaImagen = :rutaImagen WHERE idImagen = :idImagen");
			$sentencia->bindParam(":rutaImagen", $rutaImagen);
			$sentencia->bindParam(":idImagen", $idImagen);
			return $sentencia->execute();
		}


	}
?> 