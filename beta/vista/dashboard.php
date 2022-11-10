<?php
        require_once "../modelo/dashboard.php";
        class dashboard {
            function __construct() {
                $this->modelo = new dashboardModelo();
            }
                function index() {
                    if (isset($_SESSION["id"])) { //Dashboard de los usuarios
                        ?>
                            <div class="row">
                                <div class="col s12 xl4">
                                    <div class="col s12 subWrapper">
                                        <div class="row">
                                            <div class="col s12">
                                                <h6 class="subtituloModulo">
                                                    <i class="material-icons dorado-text">emoji_events</i> Dashborard Ejemplo <?php echo date("Y"); 
                                                    $consulta_ejemplo=$this->modelo->consulta_ejemplo();
                                                    echo "<h1>";
                                                    print_r($consulta_ejemplo[0]["descripcion"]);
                                                    echo "</h1>";
                                                    ?>
                                                    
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    } else { //Dashboard de los administradores
                        ?>
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="col s12 subWrapper estadisticas-generales-wrapper">
                                        <div class="row">
                                            <div class="col s12">
                                                <h6 class="subtituloModulo"><i class="material-icons dorado-text">event</i> Dashborard Ejemplo <?php echo date("Y"); ?></h6>
                                                <br>
                                                <div class="col s12 center">
                                                    <div style="margin: auto;width: 100%;max-width: 100%;">
                                                        <div id="containera" style="width:100%; height:310px;">
                                                            <?php  $consulta_ejemplo=$this->modelo->consulta_ejemplo();
                                                                echo "<h1>";
                                                                print_r($consulta_ejemplo[0]["descripcion"]);
                                                                echo "</h1>";
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                
            }
        }
        ?>