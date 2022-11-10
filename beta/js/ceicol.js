//Cuando se termine de cargar el documento
        $(document).ready(function () {
            $('.sidenav').sidenav();
            //Inactividad
                inactividad();
                $(document).click(function() {
                    inactividad();
                });
            //Botones del nav
                $('#cerrarSesion').click(cerrarSesion);
            //Loader
                $('#loader_wrapper_v2').removeClass('hide');
            //Modulo inicial
                ceicol();
        });
        //Pymes
            var ceicol_seleccionada = 0;
            function ceicol() {
                M.Toast.dismissAll();
                $('#loader_wrapper_v2').removeClass('hide');
                $('.modal').modal();
                $.ajax({
                    url: '../../controlador/ceicol.php',
                    data: {
                        clase: 'ceicol',
                        tipo: 'vista',
                        metodo: 'index',
                    },
                    type: 'post',
                    success: function (result) {
                        $('#wrapperPrincipal').html(result);
                        $('#loader_wrapper_v2').addClass('hide');
                        $('#btn_sidenav_ceicol').addClass('active');
                        $('#tabla_ceicol').find('.ver-datos-ceicol').click(verPyme);
                        $('.revisar-aprobacion').click(revisarAprobacion);
                        $('.revisar-aprobacion-cobranza-especializada').click(revisarAprobacion);
                        $('.actividad-reciente').click(actividadReciente);
                        $('.cambiar-estado-ceicol').change(cambiarEstadoPyme);
                        $('#buscar').keyup(busqueda);
                        $('.dropdown-trigger').dropdown({
                            constrainWidth: false,
                            coverTrigger: false,
                        });
                        $('.tooltipped').tooltip();
                        $('.btn-ver-opciones').click(function() {
                            ceicol_seleccionada = $(this).parent().attr('data-id');
                        });
                        $('.ordenar-columna').click(function() {
                            var numero_columna = $(this).attr('data-columna');
                            var orden = 'default';
                            var active = ($(this).find('i').hasClass('active')) ? 1 : 0;
                            $('.ordenar-columna').each(function() {
                                $(this).find('i').removeClass('active');
                            });
                            if ($(this).find('i').hasClass('active') || active == 1) {
                                $(this).find('i').removeClass('active');
                            } else {
                                $(this).find('i').addClass('active');
                            }
                            if ($(this).attr('data-orden') == 0) {
                                $(this).attr('data-orden', 1);
                                orden = 'invertir';
                            } else {
                                $(this).attr('data-orden', 0);
                            }
                            $('#tabla_ceicol').find('tbody').find('tr').each(function() {
                                $('#tabla_ceicol').find('tbody').find('tr').each(function() {
                                    if (typeof $(this).next().find('td:nth-child(' + numero_columna + ')').html() !== 'undefined') {
                                        if (orden == 'default') {
                                            if ($(this).find('td:nth-child(' + numero_columna + ')').html().toLowerCase() > $(this).next().find('td:nth-child(' + numero_columna + ')').html().toLowerCase()) {
                                                $(this).next().insertBefore($(this));
                                            }
                                        } else {
                                            if ($(this).find('td:nth-child(' + numero_columna + ')').html().toLowerCase() < $(this).next().find('td:nth-child(' + numero_columna + ')').html().toLowerCase()) {
                                                $(this).next().insertBefore($(this));
                                            }
                                        }
                                    }
                                });
                            });
                        });
                    }
                });
            }