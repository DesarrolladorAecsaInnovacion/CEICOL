//Cuando se termine de cargar el documento
        $(document).ready(function() {
            $('.sidenav').sidenav();
            //Loader
                $('#loader_wrapper_v2').removeClass('hide');
            //Modulo Inicial
                dashboard();
        });
    //Dashboard
        function dashboard() {
            var dominio = window.location.hostname;
            $.ajax({
                url: '../../controlador/ceicol.php',
                data: {
                    clase: 'dashboard',
                    tipo: 'vista',
                    metodo: 'index',
                },
                type: 'post',
                success: function(result) {
                    $('#loader_wrapper_v2').addClass('hide');
                    $('#wrapperPrincipal').html(result);                   
            }});
        }