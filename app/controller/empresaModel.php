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
		 * Función para obtener la misión de la empresa
		 */
		function get_mision(){

			$sentencia = $this->_db->prepare("SELECT misionEmpresa FROM Empresa WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			$mision = $response[0];
			return $mision;
		}

		/*
		 * Función para obtener la visión de la empresa
		 */
		function get_vision(){

			$sentencia = $this->_db->prepare("SELECT visionEmpresa FROM Empresa WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			$vision = $response[0];
			return $vision;
		}

		/*
		 * Función para obtener la filosofía de la empresa
		 */
		function get_filosofia(){

			$sentencia = $this->_db->prepare("SELECT filosofiaEmpresa FROM Empresa WHERE idEmpresa = :idEmpresa");
			$idEmpresa = 1;
			$sentencia->bindParam(':idEmpresa', $idEmpresa);
			$sentencia->execute();
			$response = array();

			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			$filosofia = $response[0];
			return $filosofia;
		}
	}
?>