$(document).ready(function() {
    $('#btn-usuario-ajax').click(function(){
     		var url = "../controller/insertarUsuarioAjax"; // El script a dónde se realizará la petición.
        	$.ajax({
               type: "POST",
               url: url,
               data: $("#form-usuario-ajax").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#e_nombre").html('');
                   $("#e_apellido").html('');
                   $("#e_cedula").html('');
                   $("#e_password").html('');
                   $("#e_repetir_password").html('');
                   $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
               }
            });
    		return false; // Evitar ejecutar el submit del formulario.
	});

    $('#btn-login-ajax').click(function(){
     	var url = "../controller/login"; // El script a dónde se realizará la petición.
    	$.ajax({
           type: "POST",
           url: url,
           data: $("#form-login-ajax").serialize(), // Adjuntar los campos del formulario enviado.
           success: function(data)
           {
               $("#e_idUsuario").html('');
               $("#e_password").html('');
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
        });
        return false; // Evitar ejecutar el submit del formulario.
	});

    $('#btn-producto-ajax').click(function(){
      var url = "../controller/cargarImagenesProyecto"; // El script a dónde se realizará la petición.
      $.ajax({
           type: "POST",
           url: url,
           data: $("#form-proyecto-ajax").serialize(), // Adjuntar los campos del formulario enviado.
           
           success: function(data)
           {
               $("#e_nombre_proyecto").html('');
               $("#e_descripcion_proyecto").html('');
               $("#e_fecha_proyecto").html('');
               $("#e_imagen_proyecto").html('');
               $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
           }
        });
        return false; // Evitar ejecutar el submit del formulario.
  });

     $('#btn-editar-usuario-ajax').click(function(){
        var url = "../controller/editarUsuarioAjax"; // El script a dónde se realizará la petición.
          $.ajax({
               type: "POST",
               url: url,
               data: $("#form-editar-usuario-ajax").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#e_nombre").html('');
                   $("#e_apellido").html('');
                   $("#e_cedula").html('');
                   $("#e_password").html('');
                   $("#e_repetir_password").html('');
                   $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
               }
            });
        return false; // Evitar ejecutar el submit del formulario.
  });

      $('#cerrarSesion').click(function(){
          var url = "../controller/logout"; // El script a dónde se realizará la petición.
          $.ajax({
               type: "POST",
               url: url,
               success: function(){
                location.reload();
               }
            });
        return false; // Evitar ejecutar el submit del formulario.
  });

      $('#btn-editar-mision-ajax').click(function(){
        var url = "../controller/editarEmpresaAjax"; // El script a dónde se realizará la petición.
          $.ajax({
               type: "POST",
               url: url,
               data: $("#form-editar-mision-ajax").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#e_mision").html('');
                   $("#mensajeMision").html(data); // Mostrar la respuestas del script PHP.
               }
            });
        return false; // Evitar ejecutar el submit del formulario.
  });

      $('#btn-editar-vision-ajax').click(function(){
        var url = "../controller/editarEmpresaAjax"; // El script a dónde se realizará la petición.
          $.ajax({
               type: "POST",
               url: url,
               data: $("#form-editar-vision-ajax").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#e_vision").html('');
                   $("#mensajeVision").html(data); // Mostrar la respuestas del script PHP.
               }
            });
        return false; // Evitar ejecutar el submit del formulario.
  });

      $('#btn-editar-filosofia-ajax').click(function(){
        var url = "../controller/editarEmpresaAjax"; // El script a dónde se realizará la petición.
          $.ajax({
               type: "POST",
               url: url,
               data: $("#form-editar-filosofia-ajax").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#e_filosofia").html('');
                   $("#mensajeFilosofia").html(data); // Mostrar la respuestas del script PHP.
               }
            });
        return false; // Evitar ejecutar el submit del formulario.
  });

      $('#btn-contacto-ajax').click(function(){
        var url = "../controller/enviarMail"; // El script a dónde se realizará la petición.
          $.ajax({
               type: "POST",
               url: url,
               data: $("#form-contacto-ajax").serialize(), // Adjuntar los campos del formulario enviado.
               success: function(data)
               {
                   $("#e_asunto").html('');
                   $("#e_nombre").html('');
                   $("#e_email").html('');
                   $("#e_telefono").html('');
                   $("#e_ciudad").html('');
                   $("#e_mensaje_usuario").html('');
                   $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
               }
            });
        return false; // Evitar ejecutar el submit del formulario.
      });
  
  // variable que contendrá todas las opciones del archivo a subir.
  // plugin obtenido de https://github.com/hayageek/jquery-upload-file/
  var uploadObj = $("#fileuploader").uploadFile({
        url: "../controller/editarSliderAjax", //url donde se enviará la petición
        multiple: false, //defino que no se puedan arrastrar y soltar mas de 1 archivo
        allowedTypes: "png,jpg,jpeg", // extensiones permitidas
        fileName: "myfile", //nombre del archivo a enviar por $_Files
        showDelete: false, //ocultar botón eliminar
        showDone: false, //ocultar botón de Hecho
        showProgress: true, //mostrar barra de progreso
        showPreview: true, //mostrar previsualización de las imagenes a cargar
        autoSubmit: false, //deshabilitar el envio del archivo automaticamente, para poder ser enviado se utiliza la función startUpload()
        showStatusAfterSuccess: true, //mostrar estado despues de haber cargado correctamente las imagenes
        maxFileCount: 1, //número máximo de archivos a subir
        maxFileSize: 3145728, //tamaño máximo permitido de los archivos en bytes, en MB: 3MB
        maxFileCountErrorStr: "Acción no permitida, el número máximo de archivos a subir es: ", //string que aparece al momento de tener un error del número máximo de archivos
        dragDropStr: "<span><b> Arrastra &amp; Suelta los Archivos</b></span>", //string que aparece al momento de tener un error de arrastrar y soltar varios archivos cuando la opción multiple está en false
        sizeErrorStr: "Acción no permitida, el tamaño máximo del archivo es: ", //string que aparece cuando los archivos superan el tamaño máximo permitido
        extErrorStr: "Acción no permitida, las extensiones válidas son: ", //string que aparece cuando existe un error en las extensiones de los archivos a cargar
        cancelStr: "Cancelar", //string del botón cancelar
        uploadButtonClass:"btn btn-info", //clase del botón de carga, se definió una clase de bootstrap
        dragdropWidth: "100%", //defino el ancho del area donde se arrastra y sueltan los archivos
        statusBarWidth: "100%", //defino el acho de la barra de estado.
        //Datos del formulario dinámico, estos son los datos que se envian además de las imagenes, se recuperan con
        // $_POST['ID_ESPECIFICADO']
        dynamicFormData:function()
        {
            var id = $("#idImagen").val(); //capturo el id de la imagen cargado en el input oculto
            var titulo =  $("#tituloImagen").val(); //capturo el titulo cargado en el input.
            // los datos que se van a enviar
            var data = {
              idImagen: id, //id de la imagen
              tituloImagen: titulo //titulo de la imagen
            };
            return data; //debo retornar data para poder que se envien junto con las imagenes.
        },
        onSelect:function(files,data,xhr) //función que se llama después de seleccionar los archivos.
        {
            // espero 0,3 segundos para mostrar o ocultar el contenedor de carga de archivos
            setTimeout(
             function(){
                  if($('.ajax-file-upload-error').is(':visible')){
                    $("#contenedor-upload-file").show();
                  }
                  else{
                    $("#contenedor-upload-file").hide();
                    $('#e_imagen').text("");
                  }
             }, 300);
        },
        onCancel:function(files,pd) //función que se llama después de dar clic en cancelar una imagen
        {
            $("#contenedor-upload-file").show(); //muestro de nuevo la funcionalidad de cargar imagenes.
        },
        onSuccess:function(files,data,xhr,pd)
        {
            $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
        },
        afterUploadAll:function(obj)
        {
            $("#mensaje").html(obj); // Mostrar la respuestas del script PHP.
        },
        onError: function(files,status,errMsg,pd)
        {
            alert("Surgio error");
            alert(files);
            alert(status);
            alert(errMsg);
            alert(pd);
            //status: error status
            //errMsg: error message
        }
    });

    // si existe el botón btn-agregar-slider-ajax es porque se trata de que el usuario está agregando
    // una nueva imagen del slider, así que modifico la url a donde se enviará la petición
   if($('#btn-agregar-slider-ajax').length){
      //Ejecutar si existe el elemento
      uploadObj.update({
         url: "../controller/insertarSliderAjax",
         dynamicFormData:function()
         {
            var titulo =  $("#tituloImagen").val(); //capturo el titulo cargado en el input.
            // los datos que se van a enviar
            var data = {
              tituloImagen: titulo //titulo de la imagen
            };
            return data; //debo retornar data para poder que se envien junto con las imagenes.
         }
     });
   }else if($('#btn-crear-proyecto-ajax').length){ 
      uploadObj.update({
         url: "../controller/insertarProyectoAjax",
         multiple:false,
         maxFileCount:1,
         maxFileSize: 5145728,
         dynamicFormData:function()
         {
           var nombre = $("#nombreProyecto").val(); //capturo el nombre del proyecto a crear
           var descripcion = $("#descripcionProyecto").val(); //capturo la descripcion del proyecto a crear
           var fecha = $("#fecha").val(); //capturo la fecha de creacion del proyecto a crear                                  
           // los datos que se van a enviar
           var data = {
             nombreProyecto: nombre, //nombre del proyecto
             descripcionProyecto: descripcion, //descripcion del proyecto
             fechaProyecto: fecha //fecha de creacion del proyecto
           };                
           return data; //debo retornar data para poder que se envien junto con las imagenes.
         }
      });
   }else if($('#btn-agregar-cliente-ajax').length){ 
     // Si existe este botón, el usuario estará agregando un cliente
     // Ejecutar si existe el elemento
     uploadObj.update({
         url: "../controller/insertarClienteAjax",
         maxFileSize: 2097152, // 2MB escritos en bytes
         dynamicFormData:function()
         {
           var nombre =  $("#nombreCliente").val(); //capturo el nombre del cliente cargado en el input.
           // los datos que se van a enviar
           var data = {
             nombreCliente: nombre //nombre del cliente
           };
           return data;
         }
     });
   }

    // Datapicker para las fechas en general.
    $('#fecha').datepicker({
      format: "dd/mm/yyyy",
      todayBtn: "linked",
      clearBtn: true,
      todayHighlight: true
    });

    // al dar clic en guardar cambios al momento de editar una imagen del slider
    // ejecuto el plugin uploadFile.
   $('#btn-editar-slider-ajax').click(function(){  
      if($('#contenedor-upload-file').is(':visible')){ // si solo cambia el titulo y no carga ninguna imagen.
         var url = "../controller/editarSliderAjax"; // El script a dónde se realizará la petición.
         var id = $("#idImagen").val(); //capturo el id de la imagen cargado en el input oculto
         var titulo =  $("#tituloImagen").val(); //capturo el titulo cargado en el input.
         // los datos que se van a enviar
         var data = {
           idImagen: id, //id de la imagen
           tituloImagen: titulo //titulo de la imagen
         };
        $.ajax({
            type: "POST",
            url: url,
            data: data, // Adjuntar los campos del formulario enviado.
            success: function(data)
            {
                 $("#mensaje").html(data); // Mostrar la respuestas del script PHP.
            }
          });
         return false; // Evitar ejecutar el submit del formulario.
      }else
         uploadObj.startUpload(); // si carga imagenes y modifica el titulo.
   });

    // al dar clic en crear imagen slider cambios al momento de crear una imagen del slider
    // ejecuto el plugin uploadFile.
    $('#btn-agregar-slider-ajax').click(function(){
        var error = false;
      $('#e_nombre').text("");
      $('#e_imagen').text("");
      var nombre =  $("#tituloImagen").val(); //capturo el nombre del cliente cargado en el input.
          if(nombre  == ''){
            $('#e_nombre').text("El campo titulo es necesario.");
            error = true;
          }
          if ($("#contenedor-upload-file").is(":visible")) {
            $('#e_imagen').text("La imagen es necesaria.");
            error = true;
          }
        if(!error)
          uploadObj.startUpload();
    });

   // al dar clic en agregar cliente ajax ejecuto el plugin uploadFile.
   $('#btn-agregar-cliente-ajax').click(function(){
      var error = false;
      $('#e_nombre').text("");
      $('#e_imagen').text("");
      var nombre =  $("#nombreCliente").val(); //capturo el nombre del cliente cargado en el input.
      if(nombre  == ''){
         $('#e_nombre').text("El campo nombre es necesario.");
         error = true;
      }
      if ($("#contenedor-upload-file").is(":visible")) {
         $('#e_imagen').text("La imagen es necesaria.");
         error = true;
      }
      if(!error)
         uploadObj.startUpload();
   });

   // al dar clic en crear proyecto ajax ejecuto el plugin uploadFile
   $('#btn-crear-proyecto-ajax').click(function(){   
      var error = false;
      $('#e_nombre_proyecto').text("");
      $('#e_descripcion_proyecto').text("");
      $('#e_fecha_proyecto').text("");
      var nombre = $('#nombreProyecto').val();
      var descripcion = $('#descripcionProyecto').val();
      var fecha = $('#fecha').val();
      if(nombre == ''){
         $('#e_nombre_proyecto').text("El nombre del proyecto es obligatorio");
         error = true;
      }
      if (descripcion == '') {
         $('#e_descripcion_proyecto').text("La descripción del proyecto es obligatoria");
         error = true;
      }
      if (fecha == '') {
         $('#e_fecha_proyecto').text("La fecha del proyecto es obligatoria");
         error = true;
      } 
      if (!error)          
         uploadObj.startUpload();
   });

});