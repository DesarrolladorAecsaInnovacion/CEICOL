<?php
    require "vista/pagina.php";
    $pagina = new pagina();
?>
<!doctype html>
<html lang="es-co">
    <head>
        <?php $pagina->head("Contacto - CEI", "Coming Soon", "https://ceicol.net.co", "", "externo"); ?>
    </head>
    <body class="white">
        <?php
            $pagina->nav();
            $pagina->contacto();
            $pagina->footer();
            $pagina->scripts("externo", true);
        ?>
        <script>
            var CaptchaCallback = function() {
                grecaptcha.render('captcha_wrapper_contacto', {'sitekey' : '6LcI-qAjAAAAABJiYuRaZ34Po3prUAIxRG5QjCxY'});
            };                
        </script> 
    </body>
</html>