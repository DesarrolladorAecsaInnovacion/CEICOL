//Cuando se termine de cargar el documento
        $(document).ready(function() {
            $('.dropdown-trigger').dropdown();
            $('.sidenav').sidenav();
            $('.parallax').parallax();
            $('.carousel').carousel({
                padding: 20,
                dist: 0,
            });
            $('#retroceder_carrusel').click(cambiarCarruselIndex);
            $('#avanzar_carrusel').click(cambiarCarruselIndex);
            $('#carousel_index').css({
                'height': $('#carousel_index').prop('scrollHeight') + 'px',
            });
            var x = window.matchMedia('(max-width: 992px)')
            media_queries_index_tablet(x);
            x.addListener(media_queries_index_tablet);
            var y = window.matchMedia('(max-width: 600px)')
            media_queries_index_movil(y);
            y.addListener(media_queries_index_movil);
            $('#buscar').keyup(buscar);
            $('#enlace_nosotros').click(function() {
                $('.sidenav').sidenav('close');
            });
        });
            function solicitarPermiso() {
                // Notification.requestPermission().then((result) => {
                //     console.log(result);
                // });
                /*DeviceMotionEvent.requestPermission().then((result) => {
                    alert(result);
                });*/
            }
            function cambiarCarruselIndex() {
                if ($(this).attr('id') == 'retroceder_carrusel') {
                    $('.carousel').carousel('prev');
                } else {
                    $('.carousel').carousel('next');
                }
            }
            function buscar() {
                var busqueda = $(this).val();
                if ($(this).val() != '') {
                    $('#sin_resultados').removeClass('hide');
                    $('#parametro_busqueda').html(busqueda);
                } else {
                    $('#sin_resultados').addClass('hide');
                }
            }
    //Iniciar sesión
        $('#entrar').click(iniciar_sesion);
        function iniciar_sesion() {
            M.Toast.dismissAll();
            //var captcha = grecaptcha.getResponse(0);
            if($('#correo').val() == '' || $('#correo').val() == ' ' || $('#correo').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir un correo valido'});
                $('#correo').focus();
            } else if($('#contrasena').val() == '' || $('#contrasena').val() == ' ' || $('#contrasena').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir una contraseña'});
                $('#contrasena').focus();
            }/* else if(captcha == '') {
                M.toast({html: 'Necesita completar el captcha'});
            }*/ else {
                $('#loader_wrapper_v2').removeClass('hide');
                $.ajax({
                    url: 'controlador/ceicol.php',
                    data: {
                        clase: 'index',
                        tipo: 'modelo',
                        metodo: 'iniciar_sesion',
                        data: {
                            correo: $('#correo').val(),
                            contrasena: $('#contrasena').val(),
                            //captcha: captcha,
                        },
                    },
                    type: 'post',
                    success: function(result) {
                        $('#loader_wrapper_v2').addClass('hide');
                        console.log(result);
                        if (result == 1) {
                            window.location.href = 'ceicol/';
                        } else if(result == 2) {
                            M.toast({html: 'Credenciales incorrectas'});
                            $('#correo').focus();
                            //grecaptcha.reset(0);
                        } else if(result == 3) {
                            M.toast({html: 'Necesita completar nuevamente el captcha'});
                            //grecaptcha.reset(0);
                        } else if(result == 4) {
                            M.toast({html: 'Ya hay una sesión activa con este usuario'});
                            $('#correo').val('');
                            $('#correo').focus();
                            $('#contrasena').val('');
                            //grecaptcha.reset(0);
                        } else {
                            M.toast({html: 'No existe un usuario con ese correo'});
                            $('#correo').focus();
                            //grecaptcha.reset(0);
                        }
                }});
            }
        }
        $('#cambiar_contrasena').click(cambiar_contrasena);
        function cambiar_contrasena() {     
            if($('#contrasenaActual').val() == '' || $('#contrasenaActual').val() == ' ' || $('#contrasenaActual').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir una contraseña valida'});
                $('#contrasenaActual').focus();
            } else if($('#contrasenaNueva').val() == '' || $('#contrasenaNueva').val() == ' ' || $('#contrasenaNueva').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir una contraseña nueva'});
                $('#contrasenaNueva').focus();
            } else if($('#contrasenaNueva2').val() == '' || $('#contrasenaNueva2').val() == ' ' || $('#contrasenaNueva2').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir una contraseña nueva'});
                $('#contrasenaNueva2').focus();            
            } else if($('#contrasenaNueva').val() != $('#contrasenaNueva2').val()) {
                M.toast({html: 'Las contraseñas no coinciden por favor ingresarlas nuevamente'});
                $('#contrasenaNueva').focus();
            } else if($('#contrasenaNueva').val() > 8) {
                M.toast({html: 'La contraseña debe ser mayor a 8 caracteres'});
                $('#contrasenaNueva').focus();
            } else {
            $.ajax({
                url: 'controlador/index.php',
                data: {
                    clase: 'modelo',
                    metodo: 'cambiarContrasena',
                    data:{
                        passActual: $('#contrasenaActual').val(),
                        pass: $('#contrasenaNueva').val(),
                    }
                },
                type: 'post',
                success: function(result) {
                    $('#loader_wrapper_v2').addClass('hide');                
                    M.Toast.dismissAll();
                    if (result == 1) {
                        $('#modalGenerico').modal('close');                    
                        //todasLasFacturasDeUnCliente();                    
                        swal('¡Buen trabajo!', 'Contraseña Actualizada.', 'success').then(okay => { if (okay) { window.location.href = 'iniciar-sesion.php'; } });
                        //window.location.href='iniciar-sesion.php';
                    }
                    else if (result == 'contrasenaerronea'){
                        swal('Error', 'Contraseña no coincide con la actual.', 'error').then(okay => { if (okay) { window.location.href = 'iniciar-sesion.php'; } });
                    } 
                     else {                    
                        swal('!Error¡', 'Contraseña no se pudo actualizar la contraseña.', 'error').then(okay => { if (okay) { window.location.href = 'iniciar-sesion.php'; } });
                    }
            }});
    
            }
        }
        function media_queries_index_tablet(x) {
            if (x.matches) { // If media query matches
                $('#wrapper_logos_empresas').removeClass('valign-wrapper');
            } else {
                $('#wrapper_logos_empresas').addClass('valign-wrapper');
            }
        }
        function media_queries_index_movil(y) {
            if (y.matches) { // If media query matches
                $('#wrapper_imagen_mision').parent().removeClass('valign-wrapper');
                $('#wrapper_vision').parent().removeClass('valign-wrapper');
                $('#wrapper_logos_empresas').removeClass('valign-wrapper');
            } else {
                $('#wrapper_imagen_mision').parent().addClass('valign-wrapper');
                $('#wrapper_vision').parent().addClass('valign-wrapper');
                $('#wrapper_logos_empresas').addClass('valign-wrapper');
            }
        }