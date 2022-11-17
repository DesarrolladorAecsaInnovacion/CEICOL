<?php
        require "../modelo/index.php";
        $modelo = new indexModelo();
            @\session_start();
            
            if (!isset($_SESSION["id"])) {
                ?>
                    <script>window.location.href = "../";</script>
                <?php
            } else {
                /*$cambioContrasena=$modelo->contrasenaPrimeraVez();        
                $cambioContrasena3Meses=$modelo->cambioContrasena3meses();   */          
                /*if(isset($_SESSION["id_pymes"]) && $cambioContrasena[0]["cambio_contrasena"]==1 || isset($_SESSION["id_pymes"]) && $cambioContrasena3Meses[0]["meses_transcurridos"]>3) {
                    ?>
                        <script>window.location.href = "../cambiar-contrasena.php";</script>
                    <?php   
                } else {*/        
                    ?>
                        <script>window.location.href = "../ceicol/dashboard/";</script>
                    <?php
                // }
            }
        
        ?>