<?php 
	/*
	 * Incluyo el modelo.php que contendrá la conexión a la base de datos, y será el padre de esta clase.
	 */
	require_once "model.php";

	class EmpresaModel extends Model{

		/*
		 * Constructor de la clase EmpresaModel el cual se conectará a la base de datos por medio del constructor del padre.
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * ------------------------------------------------------------------------------------------------------------
		 * 
		 * ----------------------------- GET DE EMPRESA (Misión y Visión)  --------------------------------------------
		 * 
		 * ------------------------------------------------------------------------------------------------------------
		 */

		/*
		 * Función para obtener la misión de la empresa.
		 */
		function get_mision(){

			$sentencia = $this->_db->prepare("SELECT misionEmpresa FROM Empresa WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			$sentencia->execute();
			$mision = $sentencia->fetch(PDO::FETCH_ASSOC);
			return $mision;
		}

		/*
		 * Función para obtener la visión de la empresa.
		 */
		function get_vision(){

			$sentencia = $this->_db->prepare("SELECT visionEmpresa FROM Empresa WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			$sentencia->execute();
			$vision = $sentencia->fetch(PDO::FETCH_ASSOC);
			return $vision;
		}

		/*
		 * Función para obtener la filosofía de la empresa.
		 */
		function get_filosofia(){

			$sentencia = $this->_db->prepare("SELECT filosofiaEmpresa FROM Empresa WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			$sentencia->execute();
			$filosofia = $sentencia->fetch(PDO::FETCH_ASSOC);
			return $filosofia;
		}

		/*
		 * Función para actualizar la misión de la empresa.
		 */
		function update_mision($mision){

			$sentencia = $this->_db->prepare("UPDATE Empresa SET misionEmpresa = :mision WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':mision', $mision);
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			return $sentencia->execute();
		}

		/*
		 * Función para actualizar la visión de la empresa.
		 */
		function update_vision($vision){

			$sentencia = $this->_db->prepare("UPDATE Empresa SET visionEmpresa = :vision WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':vision', $vision);
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			return $sentencia->execute();
		}

		/*
		 * Función para actualizar la filosofía de la empresa.
		 */
		function update_filosofia($filosofia){

			$sentencia = $this->_db->prepare("UPDATE Empresa SET filosofiaEmpresa = :filosofia WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':filosofia', $filosofia);
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			return $sentencia->execute();
		}
	}
?>