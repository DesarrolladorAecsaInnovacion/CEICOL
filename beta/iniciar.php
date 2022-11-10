<?php
        require "vista/pagina.php";
        $pagina = new pagina();
        ?>
            <!doctype html>
            <html lang="es-co">
                <head>
                    <?php $pagina->head("ceicol", "Coming Soon", "https://ceicol.com", "", "externo"); ?>
                </head>
                <body class="blue-grey">
                    <?php
                        $pagina->nav();
                        $pagina->iniciar();
                        $pagina->footer();
                        $pagina->scripts("externo", false);
                    ?>
                    </body>
                </html>
            <?php
        ?>