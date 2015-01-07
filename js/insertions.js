$(function(){
    $("#btn-usuario-ajax").click(function(){
 		var url = "../app/controller/insertarUsuarioAjax"; // El script a dónde se realizará la petición.
    	$.ajax({
           type: "POST",
           url: url,
           data: $("#form-ajax").serialize(), // Adjuntar los campos del formulario enviado.
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
});