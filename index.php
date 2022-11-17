<?php
        require "vista/pagina.php";
        $pagina = new pagina();
        ?>
            <!doctype html>
            <html lang="es-co">
                <head>
                    <?php $pagina->head("CEI", "Coming Soon", "https://ceicol.net.co", "", "externo"); ?>
                </head>
                <body class="white">
                    <?php
                        $pagina->nav();
                        $pagina->index();
                        $pagina->footer();
                        $pagina->scripts("externo", false);
                    ?>
                    </body>
                </html>
            <?php
        ?>