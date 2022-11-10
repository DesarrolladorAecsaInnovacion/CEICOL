<?php
        class moduloTexto
        {
            function __construct()
            {
                date_default_timezone_set("America/Bogota");
                $this->nombreProyecto="ceicol";        
            }
            function indexTexto($nombreModulo){
                $indexTexto='<?php
                @\session_start();
                if (!isset($_SESSION["id"])/* || isset($_SESSION["cambio_contrasena"])*/) {
                    ?>
                        <script>window.location.href = "../";</script>
                    <?php
                } else {
                    require "../../vista/ceicol.php";
                    $nuevoModulo = new ceicol();
                    ?>
                        <!DOCTYPE html>
                        <html lang="es-co">
                            <head>
                                <?php $nuevoModulo->head("Pruebas | Titulo Ejemplo"); ?>
                            </head>
                            <body>
                                <?php $nuevoModulo->nav(); ?>
                                <?php $nuevoModulo->principal(); ?>
                                <?php $nuevoModulo->scripts(".$nombreModulo."); ?>
                            </body>
                        </html>
                    <?php
                }
            ?>';
                return $indexTexto;
            }
            function modeloTexto($nombreModulo){
                $moduloTexto='<?php
                //Este es un ejemplo debe ajustarlo a sus bases de datos.
                require "consultas.php";
                class ".$nombreModulo."Modelo {
                    function __construct() {
                        $this->consulta = new consultas();                
                    }
                    //Consultas ejemplo
                        function consulta_ejemplo() {
                            $campos = "descripcionModulo";
                            $tabla = "".$nombreModulo."";
                            $condiciones = "";
                            $array = $this->consulta->generica("select_alternativo", $campos, $tabla, $condiciones);                    
                            return $array;
                        }
                    }';
                return $moduloTexto;
            }
            function vistaTexto($nombreModulo){
                $vistaTexto='<?php
                require_once "../modelo/dashboard.php";
                class ".$nombreModulo." {
                    function __construct() {
                        $this->modelo = new ".$nombreModulo."Modelo();
                    }
                        function index() {
                            if (isset($_SESSION["id"])) { //".$nombreModulo."
                                ?>
                                    <div class="row">
                                        <div class="col s12 xl4">
                                            <div class="col s12 subWrapper">
                                                <div class="row">
                                                    <div class="col s12">
                                                        <h6 class="subtituloModulo">
                                                            <i class="material-icons dorado-text">emoji_events</i> Ejemplo <?php echo date("Y"); 
                                                            $consulta_ejemplo=$this->modelo->consulta_ejemplo();
                                                            echo "<h1>";
                                                            print_r($consulta_ejemplo[0]["descripcionModulo"]);
                                                            echo "</h1>";
                                                            ?>
                                                            
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                            } else { 
                                ?>
                                    <div class="row">
                                        <div class="col s12 m6">
                                            <div class="col s12 subWrapper estadisticas-generales-wrapper">
                                                <div class="row">
                                                    <div class="col s12">
                                                        <h6 class="subtituloModulo"><i class="material-icons dorado-text">event</i> Ejemplo <?php echo date("Y"); ?></h6>
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
                ?>';
                return $vistaTexto;
            }
            function jsTexto($nombreProyecto){
                $jsTexto='//Cuando se termine de cargar el documento
                $(document).ready(function() {
                    $(".sidenav").sidenav();
                    //Loader
                        $("#loader_wrapper_v2").removeClass("hide");
                    //Modulo Inicial
                        dashboard();
                });
            //Dashboard
                function dashboard() {
                    var dominio = window.location.hostname;
                    $.ajax({
                        url: "../../controlador/" . $nombreProyecto . ".php",
                        data: {
                            clase: "dashboard",
                            tipo: "vista",
                            metodo: "index",
                        },
                        type: "post",
                        success: function(result) {
                            $("#loader_wrapper_v2").addClass("hide");
                            $("#wrapperPrincipal").html(result);                   
                    }});
                }';
                return $jsTexto;
            }
        
        }