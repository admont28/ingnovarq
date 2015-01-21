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
});







