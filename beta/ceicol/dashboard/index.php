<?php
        @\session_start();
        if (!isset($_SESSION["id"])/* || isset($_SESSION["cambio_contrasena"])*/) {
            ?>
                <script>window.location.href = "../";</script>
            <?php
        } else {
            require "../../vista/ceicol.php";
            $dashboard = new ceicol();
            ?>
                <!DOCTYPE html>
                <html lang="es-co">
                    <head>
                        <?php $dashboard->head("Dashboard | Titulo Ejemplo"); ?>
                    </head>
                    <body>
                        <?php $dashboard->nav(); ?>
                        <?php $dashboard->principal(); ?>
                        <?php $dashboard->scripts("dashboard"); ?>
                    </body>
                </html>
            <?php
        }
    ?>