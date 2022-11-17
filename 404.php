<?php
        require "vista/pagina.php";
        $pagina = new pagina();
        ?>
            <!DOCTYPE html>
            <html lang="es-co">
                <head>
                    <?php $pagina->head("Página no encontrada | ceicol", "Página no encontrada", "https://ceicol.com", "", "externo"); ?>
                </head>
                <body>
                    <?php $pagina->nav("", "externo"); ?>
                    <div class="row suscribirse">
                        <div class="container">
                            <h2 class="center ceicol-oscuro-text bold"><b>Página no <span class="ceicol-claro-text">Encontrada</span></b></h2>
                            <div class="col s12 center">
                                <i class="material-icons large ceicol-claro-text">help</i>
                            </div>
                            <div class="row">
                                <div class="col s12">
                                    <br>
                                    <h6 class="center"><b>La página que estabas buscando no existe o se ha movido.</b></h6>
                                    <br>
                                    <div class="col s12 center">
                                        <a href="index.php" class="btn-large ceicol-oscuro waves-effect waves-light"><b>Volver al inicio</b><i class="material-icons right">keyboard_arrow_right</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $pagina->footer("externo"); ?>
                    <?php $pagina->scripts("externo", false); ?>
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                </body>
            </html>
            <?php
        ?>