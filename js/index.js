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
            var y = window.matchMedia('(max-width: 992px)')
            media_queries_index_movil(y);
            y.addListener(media_queries_index_movil);
            $('#enlace_nosotros').click(function() {
                $('.sidenav').sidenav('close');
            });
            $('.nav-wrapper').find('ul li').each(function() {
                $(this).find('a').removeClass('active');
            });
            var url = window.location.href;
            url = url.split('/');
            url = url[url.length-1].split('#');
            if (url[0] == 'index.php') {
                $('.nav-wrapper').find('ul li:nth-child(2)').each(function() {
                    $(this).find('a').addClass('active');
                });
            } else if (url[0] == 'servicios.php') {
                $('.nav-wrapper').find('ul li:nth-child(4)').each(function() {
                    $(this).find('a').addClass('active');
                });
            } else if (url[0] == 'contacto.php') {
                $('.nav-wrapper').find('ul li:nth-child(5)').each(function() {
                    $(this).find('a').addClass('active');
                });
                $('#mensaje').characterCounter();
                $('#enviar').click(enviarContacto);
            }

        });
            function cambiarCarruselIndex() {
                if ($(this).attr('id') == 'retroceder_carrusel') {
                    $('.carousel').carousel('prev');
                } else {
                    $('.carousel').carousel('next');
                }
            }
        function media_queries_index_movil(y) {
            if (y.matches) { // If media query matches
                $('#wrapper_imagen_mision').parent().removeClass('valign-wrapper');
                $('#wrapper_vision').parent().removeClass('valign-wrapper');
                $('#wrapper_logos_empresas').removeClass('valign-wrapper');
                $('.wrapper-tarjeta-servicios').each(function() {
                    $(this).removeClass('valign-wrapper');
                });
                $('#formulario_contacto_wrapper').removeClass('valign-wrapper');
            } else {
                $('#wrapper_imagen_mision').parent().addClass('valign-wrapper');
                $('#wrapper_vision').parent().addClass('valign-wrapper');
                $('#wrapper_logos_empresas').addClass('valign-wrapper');
                $('.wrapper-tarjeta-servicios').each(function() {
                    $(this).addClass('valign-wrapper');
                });
                $('#formulario_contacto_wrapper').addClass('valign-wrapper');
            }
        }
    //Contacto
        function enviarContacto() {
            M.Toast.dismissAll();
            var captcha = grecaptcha.getResponse(0);
            if($('#nombre').val() == '' || $('#nombre').val() == ' ' || $('#nombre').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir un nombre'});
                $('#nombre').focus();
            } else if($('#correo').val() == '' || $('#correo').val() == ' ' || $('#correo').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir un correo valido'});
                $('#correo').focus();
            } else if($('#telefono').val() == '' || $('#telefono').val() == ' ' || $('#telefono').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir un telefono valido'});
                $('#telefono').focus();
            } else if($('#mensaje').val() == '' || $('#mensaje').val() == ' ' || $('#mensaje').hasClass('invalid')) {
                M.toast({html: 'Necesita escribir un mensaje'});
                $('#mensaje').focus();
            } else if(captcha == '' && 1 == 2) {
                M.toast({html: 'Necesita completar el captcha'});
            } else {
                $('#loader_wrapper_v2').removeClass('hide');
                $.ajax({
                    url: 'controlador/ceicol.php',
                    data: {
                        clase: 'index',
                        tipo: 'modelo',
                        metodo: 'enviarContacto',
                        data: {
                            nombre: $('#nombre').val(),
                            correo: $('#correo').val(),
                            telefono: $('#telefono').val(),
                            mensaje: $('#mensaje').val(),
                            captcha: captcha,
                        },
                    },
                    type: 'post',
                    success: function(result) {
                        $('#loader_wrapper_v2').addClass('hide');
                        console.log(result);
                        if (result == 1) {
                            swal({
                                title: "Información enviada con éxito",
                                icon: "success",
                            });
                            $('#nombre').val('');
                            $('#correo').val('');
                            $('#telefono').val('');
                            $('#mensaje').val('');
                            grecaptcha.reset(0);
                        } else {
                            swal({
                                title: "No se ha podido enviar la información",
                                text: "Intentelo nuevamente",
                                icon: "error",
                            });
                            grecaptcha.reset(0);
                        }
                }});
            }
        }