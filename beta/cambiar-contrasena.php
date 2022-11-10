<?php
        require "vista/pagina.php";
        $pagina = new pagina();
        @\session_start();
        if (isset($_SESSION["id_pymes"])) {
            $_SESSION["cambio_contrasena"] = 1;
        }
        ?>
        <!DOCTYPE html>
        <html lang="es-co">
        
        <head>
            <?php $pagina->head("Cambiar contraseña | ceicol", "Descripción", "https://ceicol.com/cambiar-contrasena.php", "", "externo"); ?>
        </head>
        
        <body>
            <?php $pagina->nav("", "externo"); ?>
        
            <div class="row white" style="margin-bottom: 40px;">
                <div class="col s12 m6 white" id="formulario_iniciar_sesion" style="padding: 80px !important;">
                    <div class="col s12 xl7 offset-xl3">
                        <h6 class="collectu-oscuro-text"><b>Bienvenido</b></h6>
                        <p>
                            Ingrese su contraseña actual y por favor diligencie los campos para las dos contraseñas respectivas.
                        </p>
                        <form onsubmit="return false;">
                            <div class="input-field col s12 no-padding">
                                <input id="contrasenaActual" type="password" class="validate campo-iniciar-sesion-wrapper" placeholder="Contraseña Actual" required>                        
                            </div>
                            <div class="input-field col s12 no-padding">
                                <input id="contrasenaNueva" type="password" class="validate campo-iniciar-sesion-wrapper" placeholder="Contraseña nueva" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener minimo 8 caracteres, también debe tener una letra minúscula, una letra mayúscula y un número." required>   
                                <span class="right helper-text">La contraseña debe contener minimo 8 caracteres, también debe tener una letra minúscula, una letra mayúscula y un número.</span>                     
                            </div>
                            <div class="col s12">
                                <div class="progress">
                                    <div class="determinate" style="width: 0%"></div>
                                </div>
                            </div>
                            <div class="input-field col s12 no-padding">
                                <input id="contrasenaNueva2" type="password" class="validate campo-iniciar-sesion-wrapper" placeholder="Confirmar Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="La contraseña debe contener minimo 8 caracteres, también debe tener una letra minúscula, una letra mayúscula y un número." required>                        
                            </div>
                            <div class="col s12 center no-padding">
                                <button class="btn waves-effect waves-dark btn-collectu disabled" id="cambiar_contrasena" style="border-radius: 15px;width: 100%;"><b>Cambiar Contraseña</b><i class="material-icons right">keyboard_arrow_right</i></button>
                                <p>
                                    ¿Aún no tienes una cuenta? <u><a href="planes.php" class="collectu-oscuro-text">Registrate aquí</a></u>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col s6" id="fondo_iniciar_sesion"></div>
            </div>
            <?php $pagina->footer("externo"); ?>
            <?php $pagina->scripts("externo", false); ?>
            <script>
                $("#fondo_iniciar_sesion").height($("#formulario_iniciar_sesion").innerHeight());
                $("#contrasenaNueva").keyup(function() {
                    var minuscula = (/[a-z]/.test($(this).val())) ? 1 : 0;
                    var mayuscula = (/[A-Z]/.test($(this).val())) ? 1 : 0;
                    var numero = (/[0-9]/.test($(this).val())) ? 1 : 0;
                    var progreso = (minuscula + mayuscula + numero == 3) ? $(".determinate").css({"width": "100%"}) : (minuscula + mayuscula + numero == 2) ? $(".determinate").css({"width": "66%"}) : (minuscula + mayuscula + numero == 1) ? $(".determinate").css({"width": "33%"}) : $(".determinate").css({"width": "0%"});
                    if (minuscula == 1 && mayuscula == 1 && numero == 1) {
                        $("#cambiar_contrasena").removeClass("disabled");
                    } else {
                        $("#cambiar_contrasena").addClass("disabled");
                    }
                });
            </script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </body>
        
        </html>