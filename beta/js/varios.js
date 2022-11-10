//Cuando se termine de cargar el documento
        $(document).ready(function() {
            //Inactividad
                /*inactividad();
                $(document).click(function() {
                    inactividad();
                });*/
            //Botones del nav
                $('#cerrar_sesion').click(cerrarSesion);
        });
    //Inactividad
        function inactividad() {
            $.ajax({
                url: '../../controlador/index.php',
                data: {
                    clase: 'modelo',
                    metodo: 'inactividad',
                },
                type: 'post',
                success: function(result) {
                    if (result == 1) {
                        window.location.href='../../';
                    }
            }});
        }
    //Cerrar sesión
        function cerrarSesion() {
            $.ajax({
                url: '../../controlador/index.php',
                data: {
                    clase: 'modelo',
                    metodo: 'cerrar_sesion',
                },
                type: 'post',
                success: function(result) {
                    window.location.href='../../';
            }});
        } 