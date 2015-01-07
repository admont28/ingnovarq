<?php 
	/*
	 * Incluyo el modelo.php que contendrá la conexión a la base de datos, y será el padre de esta clase.
	 */
	require_once "model.php";

	class UserModel extends Model{

		/*
		 * Constructor de la clase userModel el cual se conectará a la base de datos por medio del constructor del padre.
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * ------------------------------------------------------------------------------------------------------------
		 * 
		 * ----------------------------------------- CRUD USUARIOS  ---------------------------------------------------
		 * 
		 * ------------------------------------------------------------------------------------------------------------
		 */
		
		/*
		 * Función para insertar un usuario en la base de datos
		 */
		function insert_db_user($cedula, $nombre, $apellido, $password, $isSuperAdmin){

			//Obtener la fecha del sistema
			$fecha= getDate();
			$fecha_db=$fecha1['year']."-".$fecha1['mon']."-".$fecha1['mday'];

			//Creación de una consulta insertandole parametros para agregar usuarios
			$sentencia = $this->_db->prepare("INSERT INTO Usuario (cedulaUsuario, nombreUsuario, apellidoUsuario, passwordUsuario, fechaCreacionUsuario, superAdminUsuario) VALUES (:cedula, :nombre, :apellido, :password, :fecha, :super_admin)");
			$sentencia->bindParam(':cedula', $cedula);
			$sentencia->bindParam(':nombre', $nombre);
			$sentencia->bindParam(':apellido', $apellido);
			$sentencia->bindParam(':password', $password);
			$sentencia->bindParam(':fecha', $fecha_db);
			$sentencia->bindParam(':super_admin', $isSuperAdmin);

			//Ejecución de la consulta
			$sentencia->execute();
		}

		/*
		 * Función para actualizar un usuario en la base de datos
		 */
		function update_db_user($cedula, $nombre, $apellido, $password, $fecha, $isSuperAdmin){

			//Creación de una consulta insertandole parametros para actualizar usuarios
			$sentencia = $this->_db->prepare("UPDATE Usuario SET cedulaUsuario = :cedula, nombreUsuario = :nombre, apellidoUsuario = :apellido, passwordUsuario = :password, fechaCreacionUsuario = :fecha, superAdminUsuario = :super_admin");
			$sentencia->bindParam(':cedula', $cedula);
			$sentencia->bindParam(':nombre', $nombre);
			$sentencia->bindParam(':apellido', $apellido);
			$sentencia->bindParam(':password', $password);
			$sentencia->bindParam(':fecha', $fecha_db);
			$sentencia->bindParam(':super_admin', $isSuperAdmin);

			//Ejecución de la consulta
			$sentencia->execute();
		}

		/*
		 * Función para eliminar un usuario en la base de datos
		 */
		function delete_db_user($cedula){

			//Creación de una consulta insertandole parametros para eliminar usuarios
			$sentencia = $this->_db->prepare("DELETE FROM Usuario WHERE cedulaUsuario = :cedula");
			$sentencia->bindParam(':cedula', $cedula);

			//Ejecución de la consulta
			$sentencia->execute();

		}

		/*
		 * Función para devolver todos los usuarios de la base de datos
		 */
		function view_all_db_users(){

			$sentencia = $this->_db->prepare("SELECT * FROM Usuario");
			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}

			return $response;
		}

		/*
		 * Función para devolver un usuario en especifico de la base de datos
		 */
		function view_db_user($cedula){

			//Creación de una consulta insertandole parametros para obtener un usuario en especifico
			$sentencia = $this->_db->prepare("SELECT * FROM Usuario where cedulaUsuario = :cedula");
			$sentencia->bindParam(':cedula', $cedula);

			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			$usuario = $response[0];
			return $usuario;
		}
	}
?>