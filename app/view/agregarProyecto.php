<?php 
	session_start();
	if(!isset($_SESSION['idUsuario'],$_SESSION['nombreUsuario'], $_SESSION['apellidoUsuario'], $_SESSION['superAdminUsuario'])){
		header('location: error');
	}
			include_once ("imports.php");
			include_once ("header.php");
			include_once ("nav.php");
			include_once ("footer.php"); 
			require_once "../controller/projectModel.php";

			getImportsUp();
			$proyectoModel = new projectModel();
			?>

			<body id="body">
				<div class="con" id="con">
					<div class="container" id="main">
							<?php 
								getHeader();
								if($_SESSION['superAdminUsuario'] == 1){
									getNavSuperAdmin();
								}
								else
								getNavAdmin();
								//$direccion = "../controlador/cargarImagenesProductos?idproducto=".$_GET['idproducto'];
							?>
					</div>
					<div class="contenido">
						<div class="row">
							<div class="col-xs-12 col-sm-8 col-md-8">
								<div id="mensaje"></div>
								<form class="form-horizontal" id="form-proyecto-ajax" method="post" enctype="multipart/form-data">
								    <div class="form-group">
								         <label for="inputName" class="control-label col-xs-2">Nombre:</label>
								         <div class="col-xs-10">
								            <input type="name" id="nombreProyecto" name="nombreProyecto" class="form-control" placeholder="Nombre">
								         	<div class="col-xs-10 error-text" id="e_nombre_proyecto"></div>
								         </div>
								    </div>
 								    <div class="form-group">
								        <label for="inputName" class="control-label col-xs-2">Descripción:</label>
								        <div class="col-xs-10">
								            <textarea id="descripcionProyecto" name="descripcionProyecto" class="form-control" placeholder="Descripción del Proyecto"></textarea>
								        	<div class="col-xs-10 error-text" id="e_descripcion_proyecto"></div> 
								        </div>
								    </div>
								    <div class="form-group">
								        <label for="inputName" class="control-label col-xs-2">Fecha:</label>
								         <div class="col-xs-10">
								            <input type="date" id="fecha_proyecto" name="fecha_proyecto" min="2005-01-01" class="form-control" placeholder="dd/mm/aaaa">
								         	<div class="col-xs-10 error-text" id="e_fecha_proyecto"></div>
								         </div>
								    </div>	
								    <div class="form-group">
								     	<label for="inputName" class="control-label col-xs-2">Imagen:</label>
								     	<!-- The fileinput-button span is used to style the file input field as button -->
								     	<div class="col-xs-10">
										    <span class="btn btn-success fileinput-button" style="width: 100%">
										        <i class="glyphicon glyphicon-plus"></i>
										        <span id="btn-txt">Seleccione el archivo</span>
										        <!-- The file input field used as target for the file upload widget -->
										        <input id="fileupload" type="file" name="files[]" style="width: 100%" multiple>
										    </span>
										    <br>
										    <br>
										    <!-- The global progress bar -->
										    <div id="progress" class="progress">
										        <div class="progress-bar progress-bar-success"></div>
										    </div>
										    <!-- The container for the uploaded files -->
										    <div id="files" class="files"></div>
									    </div>
									</div>
								    
								     
								    <div class="form-group">
								        <div class="col-xs-offset-2 col-xs-10">
								         	<input type="hidden" name="ajax">
								            <button type="submit" id="btn-producto-ajax" class="btn btn-success">Crear Proyecto</button> 
								        </div>
								    </div>
								</form>
								
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					$(function(){

					    $('#fileupload').fileupload({
					        url: '../controller/cargarImagenesProyecto',
					        dataType: 'json',
					        done: function (e, data) {

					        	$.each(data.result.files, function (index, file) {
					        		if(!file.error){
					        			$('#files').html('<p><strong>' + file.name + '</strong></p>');
					        			$('#fileupload').hide();
					        			$('#btn-txt').text('Archivo Cargado');
					        			//$('#lista_archivo').val(file.name);
					        		}else{
					        			$('#progress .progress-bar').css(
							                'width',
							                '0%'
							            );
										$('#files').html("<p><strong>El archivo no cumple con los criterios de tamaño o tipo</strong></p>");
					        		}
						        }); 

					        },
					        progressall: function (e, data) {
					            var progress = parseInt(data.loaded / data.total * 100, 10);
					            $('#progress .progress-bar').css(
					                'width',
					                progress + '%'
					            );
					        }
					    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
					});
				</script>
				<?php
					getFooter(); 
					getImportsDown();
?>