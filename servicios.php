<?php
    require "vista/pagina.php";
    $pagina = new pagina();
?>
<!doctype html>
<html lang="es-co">
    <head>
        <?php $pagina->head("Servicios - CEI", "Coming Soon", "https://ceicol.net.co", "", "externo"); ?>
    </head>
    <body class="white">
        <?php
            $pagina->nav();
            $pagina->servicios();
            $pagina->footer();
            $pagina->scripts("externo", false);
        ?>
    </body>
</html>