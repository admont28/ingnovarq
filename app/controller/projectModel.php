<?php 
	/*
	 * Incluyo el modelo.php que contendrá la conexión a la base de datos, y será el padre de esta clase.
	 */
	require_once "model.php";

	class ProjectModel extends Model{

		/*
		 * Constructor de la clase projectModel el cual se conectará a la base de datos por medio del constructor del padre.
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * ------------------------------------------------------------------------------------------------------------
		 * 
		 * ----------------------------------------- CRUD PROYECTOS ---------------------------------------------------
		 * 
		 * ------------------------------------------------------------------------------------------------------------
		 */

		/*
		 * Función para insertar un proyecto en la base de datos
		 */
		function insert_db_project($nombre, $descripcion, $fecha, $usuario){


			//Creación de una consulta insertandole parametros para agregar proyectos
			$sentencia = $this->_db->prepare("INSERT INTO Proyecto (nombreProyecto, descripcionProyecto, fechaCreacionProyecto, Usuario_idUsuario) VALUES (:nombre, :descripcion, :fecha, :usuario)");
			$sentencia->bindParam(':nombre', $nombre);
			$sentencia->bindParam(':descripcion', $descripcion);
			$sentencia->bindParam(':fecha', $fecha);
			$sentencia->bindParam(':usuario', $usuario);
			echo $fecha;

			//Ejecución de la consulta
			$sentencia->execute();
		}

		/*
		 * Función para actualizar un proyecto en la base de datos
		 */
		function update_db_project($nombre, $descripcion, $fecha, $idProyecto){

			//Creación de una consulta insertandole parametros para actualizar proyectos
			$sentencia = $this->_db->prepare("UPDATE Proyecto SET nombreProyecto = :nombre, descripcionProyecto = :descripcion, fechaCreacionProyecto = :fecha WHERE idProyecto = :id");
			$sentencia->bindParam(':nombre', $nombre);
			$sentencia->bindParam(':descripcion', $descripcion);
			$sentencia->bindParam(':fecha', $fecha);
			$sentencia->bindParam(':id', $idProyecto);

			//Ejecución de la consulta
			return $sentencia->execute();
		}

		/*
		 * Función para eliminar un proyecto de la base de datos
		 */
		function delete_db_project($idProyecto){

			//Creación de una consulta insertandole parametros para eliminar proyectos
			$sentencia = $this->_db->prepare("DELETE FROM Proyecto WHERE idProyecto = :idProyecto");
			$sentencia->bindParam(':idProyecto', $idProyecto);

			//Ejecución de la consulta
			return $sentencia->execute();

		}

		/*
		 * Función para devolver todos los proyectos de la base de datos
		 */
		function view_all_db_projects(){

			$sentencia = $this->_db->prepare("SELECT * FROM Proyecto");
			$sentencia->execute();
			$response= array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}

			return $response;
		}

		/*
		 * Función para devolver un proyecto en especifico de la base de datos
		 */
		function view_db_project($idProyecto){

			//Creación de una consulta insertandole parametros para obtener un proyecto en especifico
			$sentencia = $this->_db->prepare("SELECT * FROM Proyecto where idProyecto = :id");
			$sentencia->bindParam(':id', $idProyecto);

			$sentencia->execute();

			$response= array();
			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			if(sizeof($response) != 0)
				return $proyecto = $response[0];
			return null;
		}

		/*
		 * Función para obtener las imagenes de un proyecto
		 */
		function view_db_img_project($idProyecto){

			//creación de una consulta para recuperar las imagenes de los proyectos
			$sentencia = $this->_db->prepare("SELECT i.idImagen, i.rutaImagen, i.tituloImagen FROM Proyecto p INNER JOIN Imagen i ON i.Proyecto_idProyecto = p.idProyecto WHERE idProyecto = :id");
			$sentencia->bindParam(':id', $idProyecto);

			$sentencia->execute();

			$response= array();
			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}

			return $response;
		}

		/*
		 * Función para obtener el ultimo proyecto insertado
		 */
		function view_db_last_project(){

			$sentencia = $this->_db->prepare("SELECT * FROM Proyecto ORDER BY idProyecto DESC LIMIT 1");
			$sentencia->execute();

			$response= array();
			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			if(sizeof($response) != 0){
				return $response[0];
			}
			return null;
		}
	}
?>