<?php 
	/*
	 * Incluyo las CONSTANTES globales para la conexión a la Base de datos (DB_HOST, DB_NAME, DB_USER, DB_PASS)
	 */
	require_once "configDB.php";

	class Model{

		/*
		 * Variable que contendrá la conexión a la base de datos.
		 */
		protected $_db;
		
		/*
		 * Funcion para realizar la conexión a la base de datos
		 */
		public function __construct(){
			try {
		    	$this->_db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,
					DB_USER, DB_PASS);
		    	/*
		    	*	linea de codigo para que la conexion a la base de datos quede en el formato
		    	*	utf8 y asi poder utilizar caracteres especiales
		    	*/
		    	$this->_db->exec("set names utf8");
			} catch (PDOException $e) {
			    echo 'Falló la conexión: ' . $e->getMessage();
			}
		}
	}
?>