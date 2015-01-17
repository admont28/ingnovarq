<?php 
	/*
	 * Incluyo el modelo.php que contendrá la conexión a la base de datos, y será el padre de esta clase.
	 */
	require_once "model.php";

	class SliderModel extends Model{

		/*
		 * Constructor de la clase sliderModel el cual se conectará a la base de datos por medio del constructor del padre.
		 */
		public function __construct(){
			parent::__construct();
		}

		/*
		 * ------------------------------------------------------------------------------------------------------------
		 * 
		 * ----------------------------------------- GET IMAGENES SLIDER  ---------------------------------------------------
		 * 
		 * ------------------------------------------------------------------------------------------------------------
		 */
		
		/*
		 * Función para obtener las imagenes del slider
		 */
		function get_slider_images(){

			$sentencia = $this->_db->prepare("SELECT * FROM Imagen WHERE sliderImagen = true");
			//Ejecución de la consulta
			$sentencia->execute();
			$response = array();
			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			return $response;
		}
	}
?>