<?php
	function get_error_login(){
		$mensaje = "<script type='text/javascript'> 
                        $(function(){
                            new PNotify({
                                title: 'Acción No Exitosa :(',
                                text: 'No se ha podido iniciar sesión con éxito, por favor revisa todos los datos e inténtelo de nuevo.',
                                type: 'error',
                                delay: 6000,
                                animation: 'show',
                            });
                        });
            		</script>";
		return $mensaje;
	}

	function get_success_login(){
		$mensaje = "<script>
                        $(function(){
                            new PNotify({
                                title: 'Acción Exitosa',
                                text: 'Ha iniciado sesión con éxito, no olvide cerrar sesión cuando termine su trabajo.',
                                type: 'success',
                                delay: 6000,
                                animation: 'show',
                            });
                        });
                    </script>";
        return $mensaje;
	}

	function get_error_insert_user(){
		$mensaje = "<script type='text/javascript'>
                        $(function(){
                            new PNotify({
                                title: 'Acción No Exitosa :(',
                                text: 'No se ha podido agregar al usuario con éxito, por favor revisa todos los datos e inténtelo de nuevo.',
                                type: 'error',
                                delay: 6000,
                                animation: 'show',
                            });
                        });
                        
                    </script>";
		return $mensaje;
	}

	function get_success_insert_user(){
		$mensaje = "<script type='text/javascript'>
                        $(function(){
                            new PNotify({
                                title: 'Acción Exitosa',
                                text: 'Se ha agregado al usuario con éxito. <br> Si desea agregar un nuevo usuario presione el botón Agregar.',
                                type: 'success',
                                
                                animation: 'show',
                                confirm: {
                                    confirm: true,
                                    buttons: [{
                                            text: 'Agregar',
                                            addClass: 'btn btn-success',
                                            click: function(notice) {
                                                notice.remove();
                                                document.location='agregarUsuario';
                                            }
                                        }, {
                                            text: 'Volver',
                                            click: function(notice) {
                                                notice.remove();
                                                document.location='perfil';
                                            }
                                        }]
                                }   
                            });
                        });
                    </script>";
		return $mensaje;
	}

    function get_success_delete_user($cedulaUsuario){
        $mensaje = "<script type='text/javascript'>
                        $(function(){
                            new PNotify({
                                title: 'Acción Exitosa',
                                text: 'El usuario con cédula No: ".$cedulaUsuario." ha sido eliminado con éxito. <br> La lista de usuarios será acutalizada al cerrar está notificación.',
                                type: 'success',
                                hide: false,
                                animation: 'show',
                                before_close: function() {
                                    document.location='listarUsuarios';
                                }
                            });
                        });
                    </script>";
        return $mensaje;
    }

    function get_error_delete_user(){
        $mensaje = "<script type='text/javascript'>
                        $(function(){
                            new PNotify({
                                title: 'Acción No Exitosa :(',
                                text: 'No se ha podido eliminar al usuario con éxito, porfavor recarga la página e inténtalo de nuevo.',
                                type: 'error',
                                delay: 6000,
                                animation: 'show',
                            });
                        });
                    </script>";
        return $mensaje;
    }

    function get_confirm_delete_user(){
        $mensaje = "<script type='text/javascript'>
                    function eliminarUsuario(cedulaUsuario){
                        new PNotify({
                            title: '¿Eliminar Usuario?',
                            text: '¿Está seguro que desea eliminar el usuario: '+cedulaUsuario+'?',
                            icon: 'glyphicon glyphicon-question-sign',
                            hide: false,
                            animation: 'show',
                            confirm: {
                                confirm: true,
                                buttons: [{
                                            text: 'Eliminar',
                                            addClass: 'btn btn-danger',
                                            click: function(notice) {
                                                notice.remove();
                                                var url = '../controller/eliminarUsuarioAjax'; 
                                                var parametros = { 
                                                    'cedulaUsuario' : cedulaUsuario,
                                                };
                                                $.ajax({
                                                   type: 'POST',
                                                   url: url,
                                                   data: parametros,
                                                   success: function(data)
                                                   {
                                                       $('#mensaje').html(data); // Mostrar la respuesta del script PHP.
                                                   }
                                                });
                                            }
                                        }, {
                                            text: 'Cancelar',
                                            click: function(notice) {
                                                notice.remove();
                                            }
                                        }]
                            },
                            buttons: {
                                closer: false,
                                sticker: false,
                            },
                            history: {
                                history: false
                            }
                        })
                    }
                </script>";
        return $mensaje;
    }

    function get_script_edit_user(){
        $mensaje = "<script type='text/javascript'>
                        $('.open').click(function(){
                            $('#e_nombre').html(''); // limpio los campos de los errores.
                            $('#e_apellido').html('');
                            $('#e_cedula').html('');
                            $('#e_password').html('');
                            $('#e_repetir_password').html('');
                            var cedula = $(this).data('id');
                            var parametros = {
                                'cedula' : cedula,
                            };
                            var url = '../controller/editarUsuarioAjax'; // El script a dónde se realizará la petición.
                            $.ajax({
                               type: 'POST',
                               url: url,
                               data: parametros, // Adjuntar los campos a enviar
                               success: function(data)
                               {
                                   $('#mensaje').html(data); // Mostrar la respuestas del script PHP.
                               }
                            });
                        });
                    </script>";
        return $mensaje;
    }

    function get_success_edit_user($cedula){
        $mensaje = "<script type='text/javascript'>
                        $(function(){
                            new PNotify({
                                title: 'Acción Exitosa',
                                text: 'Se ha editado al usuario: ".$cedula." con éxito. <br>La página será recargada en 7 segundos.',
                                type: 'success',
                                delay: 6500,
                                animation: 'show',
                            });
                        });

                    setTimeout(function(){
                        location.reload();
                    }, 7000);
                </script>";
        return $mensaje;
    }

    function get_error_edit_user(){
        $mensaje = "<script type='text/javascript'>
                        $(function(){
                            new PNotify({
                                title: 'Acción No Exitosa :(',
                                text: 'No se ha podido editar al usuario con éxito, por favor revisa todos los datos e inténtelo de nuevo.',
                                type: 'error',
                                delay: 6000,
                                animation: 'show',
                            });
                        });
                    </script>";
        return $mensaje;
    }

?>