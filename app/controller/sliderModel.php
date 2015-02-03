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

		/*
		 * Función para obtener una imagen del slider
		 */
		function view_db_image($idImagen){
			$sentencia = $this->_db->prepare("SELECT * FROM Imagen WHERE sliderImagen = true AND idImagen = :idImagen");
			$sentencia->bindParam(":idImagen",$idImagen);
			//Ejecución de la consulta
			$sentencia->execute();
			$response = array();
			while ($fila = $sentencia->fetch()) {
				$response[] = $fila;
			}
			if(sizeof($response) != 0)
				return $imagen = $response[0];
			return null;
		}


		function update_db_title_image_slider($idImagen, $tituloImagen){
			$sentencia = $this->_db->prepare("UPDATE Imagen SET tituloImagen = :tituloImagen WHERE idImagen = :idImagen");
			$sentencia->bindParam(":tituloImagen",$tituloImagen);
			$sentencia->bindParam(":idImagen",$idImagen);
			return $sentencia->execute();
		}


		function update_db_dir_image_slider($idImagen, $rutaImagen){
			$sentencia = $this->_db->prepare("UPDATE Imagen SET rutaImagen = :rutaImagen WHERE idImagen = :idImagen");
			$sentencia->bindParam(":rutaImagen",$rutaImagen);
			$sentencia->bindParam(":idImagen",$idImagen);
			return $sentencia->execute();

		}
	}
?>