<?php
        class ceicol {
            //Estructura básica común entre páginas
                function head($titulo_pagina) {
                    ?>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                        <title><?php echo $titulo_pagina; ?></title>
                        <meta name="descripción" content="Ponga su descripción aquí.">
                        <link rel="stylesheet" href="../../librerias/materialize.min.css">
                        <link rel="stylesheet" href="../../librerias/material-icons.css">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
                        <link rel="stylesheet" href="../../css/dashboard.css?id=<?php echo date("dmYHis"); ?>">
                        <link rel="icon" type="image/x-icon" href="../../img/favicon.ico">
                        <meta name="author" content="Victor Manuel Hernandez (vimahemo@gmail.com), Diego Rodríguez Veloza (rodvel2910@icloud.com)" />
                        <meta name="copyright" content="ceicol" />
                        <meta name="robots" content="noindex"/>
                        <meta name="robots" content="nofollow"/>
                        <meta http-equiv="cache-control" content="no-cache"/>
                        <meta http-equiv="expires" content="0"/>
                    <?php
                }
                function nav() {
                    /*require "../../modelo/index.php";
                    $modelo = new modelo();
                    $permisos = $modelo->permisos_sidenav();*/
                    ?>
                        <ul id="slide-out" class="sidenav sidenav-fixed">
                            <li>
                                <div class="user-view">
                                    <div class="center">
                                        <a href="../dashboard/"><img id="logo" src="../../img/logo-ceicol.png"></a>
                                        <p id="wrapper_sidenav_info_usuario">
                                            <?php
                                                //echo "<b>".$_SESSION["nombre_completo"]."</b><br>".$_SESSION["correo"]."<br><span class="ceicol-naranja white-text">".$_SESSION["rol"]."</span>";
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li><div class="divider"></div></li>
                            <?php
                                /*if (!isset($_SESSION["id_pymes"])) { //Nav para los administradores
                                    ?>
                                        <li>
                                            <a href="../dashboard/" id="btn_sidenav_dashboard" class="waves-effect waves-light <?php echo (isset($permisos[0]["ruta"]) && $permisos[0]["ruta"] == "dashboard" && isset($permisos[0]["lectura"]) && $permisos[0]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">dashboard</i></div> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="../pymes/" id="btn_sidenav_pymes" class="waves-effect waves-light <?php echo (isset($permisos[0]["ruta"]) && $permisos[0]["ruta"] == "pymes" && isset($permisos[0]["lectura"]) && $permisos[0]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">store</i></div> Pymes</a>
                                        </li>
                                        <li class="no-padding">
                                            <ul class="collapsible collapsible-accordion" id="collapsible_administradores">
                                                <li>
                                                    <a class="collapsible-header waves-effect waves-light <?php echo (isset($permisos[1]["ruta"]) && $permisos[1]["ruta"] == "administradores" && isset($permisos[1]["lectura"]) && $permisos[1]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>">
                                                        <div class="left center"><i class="material-icons">group</i></div> Administradores
                                                    </a>
                                                    <div class="collapsible-body">
                                                        <ul>
                                                            <li class="<?php //echo (isset($permisos[1]["edicion"]) && $permisos[1]["edicion"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><a id="btn_crear_administrador" href="../administradores/?crear" class="waves-effect waves-light"><div class="left center"><i class="material-icons">edit</i></div>Crear administrador</a></li>
                                                            <li><a id="btn_ver_administradores" href="../administradores/?ver" class="waves-effect waves-light"><div class="left center"><i class="material-icons">visibility</i></div>Ver administradores</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="no-padding">
                                            <ul class="collapsible collapsible-accordion" id="collapsible_roles">
                                                <li>
                                                    <a class="collapsible-header waves-effect waves-light <?php echo (isset($permisos[2]["ruta"]) && $permisos[2]["ruta"] == "roles" && isset($permisos[2]["lectura"]) && $permisos[2]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>">
                                                        <div class="left center"><i class="material-icons">engineering</i></div> Roles
                                                    </a>
                                                    <div class="collapsible-body">
                                                        <ul>
                                                            <li class="<?php echo (isset($permisos[2]["edicion"]) && $permisos[2]["edicion"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><a id="btn_sidenav_crear_rol" href="../roles/?crear" class="waves-effect waves-light"><div class="left center"><i class="material-icons">edit</i></div>Crear rol</a></li>
                                                            <li><a id="btn_sidenav_ver_roles" href="../roles/?ver" class="waves-effect waves-light"><div class="left center"><i class="material-icons">visibility</i></div>Ver roles</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="no-padding">
                                            <ul class="collapsible collapsible-accordion <?php echo (isset($permisos[3]["ruta"]) && $permisos[3]["ruta"] == "blog" && isset($permisos[3]["lectura"]) && $permisos[3]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>" id="collapsible_blog">
                                                <li>
                                                    <a class="collapsible-header waves-effect waves-light">
                                                        <div class="left center"><i class="material-icons">rss_feed</i></div> Blog
                                                    </a>
                                                    <div class="collapsible-body">
                                                        <ul>
                                                            <li class="<?php echo (isset($permisos[3]["edicion"]) && $permisos[3]["edicion"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><a id="btn_crear_entrada" href="../blog/?crear" class="waves-effect waves-light"><div class="left center"><i class="material-icons">edit</i></div>Crear entrada</a></li>
                                                            <li><a id="btn_ver_entradas" href="../blog/?ver" class="waves-effect waves-light"><div class="left center"><i class="material-icons">visibility</i></div>Ver entradas</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="../newsletter/" id="btn_sidenav_newsletter" class="waves-effect waves-light <?php echo (isset($permisos[4]["ruta"]) && $permisos[4]["ruta"] == "newsletter" && isset($permisos[4]["lectura"]) && $permisos[4]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">email</i></div> Newsletter</a>
                                        </li>
                                        <li>
                                            <a href="../novedades/" id="btn_sidenav_novedades" class="waves-effect waves-light <?php echo (isset($permisos[5]["ruta"]) && $permisos[5]["ruta"] == "novedades" && isset($permisos[5]["lectura"]) && $permisos[5]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">view_carousel</i></div> Novedades</a>
                                        </li>
                                    <?php
                                } else { //Nav para los colaboradores de las Pymes
                                    ?>
                                        <li>
                                            <a href="../dashboard/" id="btn_sidenav_dashboard" class="waves-effect waves-light <?php echo (isset($permisos[0]["ruta"]) && $permisos[0]["ruta"] == "dashboard" && isset($permisos[0]["lectura"]) && $permisos[0]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "";  ?>"><div class="left center"><i class="material-icons">dashboard</i></div> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="../clientes/" id="btn_sidenav_clientes" class="waves-effect waves-light <?php echo (isset($permisos[1]["ruta"]) && $permisos[1]["ruta"] == "clientes" && isset($permisos[1]["lectura"]) && $permisos[1]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">group</i></div> Clientes</a>
                                        </li>
                                        <li>
                                            <a href="../facturas/" id="btn_sidenav_facturas" class="waves-effect waves-light <?php echo (isset($permisos[2]["ruta"]) && $permisos[2]["ruta"] == "facturas" && isset($permisos[2]["lectura"]) && $permisos[2]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">receipt</i></div> Facturas</a>
                                        </li>
                                        <li class="">
                                            <a href="../cobranza-especializada/express.php" class="sidenav-item-2-lines waves-effect waves-light <?php echo (isset($permisos[2]["ruta"]) && $permisos[2]["ruta"] == "facturas" && isset($permisos[2]["lectura"]) && $permisos[2]["lectura"] == 1 && isset($permisos[2]["edicion"]) && $permisos[2]["edicion"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">campaign</i></div> <div>Cobranza especializada</div></a>
                                        </li>
                                        <li class="hide">
                                            <a href="../cobranza-juridica/" class="sidenav-item-2-lines waves-effect waves-light <?php echo (isset($permisos[2]["ruta"]) && $permisos[2]["ruta"] == "facturas" && isset($permisos[2]["lectura"]) && $permisos[2]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">gavel</i></div> <div>Cobranza jurídica</div></a>
                                        </li>
                                        <!-- <li>
                                            <a href="../notificaciones/" id="btn_sidenav_notificaciones" class="waves-effect waves-light <?php //echo (isset($permisos[3]["ruta"]) && $permisos[3]["ruta"] == "notificaciones" && isset($permisos[3]["lectura"]) && $permisos[3]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">notifications</i></div> Notificaciones</a>
                                        </li> -->
                                        <li class="no-padding">
                                            <ul class="collapsible collapsible-accordion" id="collapsible_notificaciones">
                                                <li>
                                                    <a class="collapsible-header waves-effect waves-light">
                                                        <div class="left center"><i class="material-icons">notifications</i></div> Notificaciones
                                                    </a>
                                                    <div class="collapsible-body">
                                                        <ul>
                                                            <li><a id="btn_sidenav_notificaciones_globales" href="../notificaciones/?globales" class="waves-effect waves-light"><div class="left center"><i class="material-icons">public</i></div>Globales</a></li>
                                                            <li><a id="btn_sidenav_notificaciones_personalizadas" href="../notificaciones/?personalizadas" class="waves-effect waves-light"><div class="left center"><i class="material-icons">send</i></div>Personalizadas</a></li>
                                                            <li><a id="btn_sidenav_notificaciones_express" href="../notificaciones/?express" class="waves-effect waves-light"><div class="left center"><i class="material-icons">bolt</i></div>Express</a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="hide">
                                            <a href="../NOMBREPROYECTO/" id="btn_sidenav_notificaciones" class="waves-effect waves-light <?php echo (isset($permisos[3]["ruta"]) && $permisos[3]["ruta"] == "NOMBREPROYECTO" && isset($permisos[3]["lectura"]) && $permisos[3]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">thumb_up</i></div> Nombre Proyecto</a>
                                        </li>
                                        <li>
                                            <a href="../ayuda/" id="btn_sidenav_ayuda" class="waves-effect waves-light <?php echo (isset($permisos[4]["ruta"]) && $permisos[4]["ruta"] == "ayuda" && isset($permisos[4]["lectura"]) && $permisos[4]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">help</i></div> Ayuda</a>
                                        </li> 
                                        <li>
                                            <a href="../configuracion/" id="btn_sidenav_configuracion" class="waves-effect waves-light <?php echo (isset($permisos[5]["ruta"]) && $permisos[5]["ruta"] == "configuracion" && isset($permisos[5]["lectura"]) && $permisos[5]["lectura"] == 1 || $permisos[0]["administrador_pyme"] == 1) ? "": "hide";  ?>"><div class="left center"><i class="material-icons">settings</i></div> Configuración</a>
                                        </li>
                                    <?php
                                }*/
                            ?>
                            <li>
                                <a href="#!" id="cerrar_sesion" class="waves-effect waves-light"><div class="left center"><i class="material-icons">exit_to_app</i></div> Cerrar sesión</a>
                            </li>
                        </ul>
                        <div class="navbar-fixed hide-on-large-only show-on-medium-and-down">
                            <nav>
                                <div class="nav-wrapper">
                                    <a href="../dashboard/" class="brand-logo"><img src="../../img/logo-ceicol-simple.png"></a>
                                    <button class="btn-flat waves-effect waves-light center sidenav-trigger" data-target="slide-out"><i class="material-icons">menu</i></button>
                                </div>
                            </nav>
                        </div>
                        <div id="modalGenerico" class="modal modal-fixed-footer"></div>
                        <div id="modalGenericoSecundario" class="modal modal-fixed-footer"></div>
                        <div id="btn_modo_oscuro" class="hide center waves-effect waves-light tooltipped" data-position="left" data-tooltip="Activar modo oscuro">
                            <i class="material-icons white-text">dark_mode</i>
                        </div>
                    <?php
                }
                function principal() {
                    ?>
                        <div id="contenedor_principal">
                            <div class="row hide-on-med-and-down" id="sub_nav">
                                <div class="col s12 m6 no-padding grey-text text-darken-1" id="fechaWrapper">
                                    <?php
                                        $dia = "";
                                        $mes = "";
                                        if (date("D") == "Mon") {
                                            $dia = "Lunes";
                                        } elseif (date("D") == "Tue") {
                                            $dia = "Martes";
                                        } elseif (date("D") == "Wed") {
                                            $dia = "Miércoles";
                                        } elseif (date("D") == "Thu") {
                                            $dia = "Jueves";
                                        } elseif (date("D") == "Fri") {
                                            $dia = "Viernes";
                                        } elseif (date("D") == "Sat") {
                                            $dia = "Sábado";
                                        } elseif (date("D") == "Sun") {
                                            $dia = "Domingo";
                                        }
                                        if (date("M") == "Jan") {
                                            $mes = "Enero";
                                        } elseif (date("M") == "Feb") {
                                            $mes = "Febrero";
                                        } elseif (date("M") == "Mar") {
                                            $mes = "Marzo";
                                        } elseif (date("M") == "Apr") {
                                            $mes = "Abril";
                                        } elseif (date("M") == "May") {
                                            $mes = "Mayo";
                                        } elseif (date("M") == "Jun") {
                                            $mes = "Junio";
                                        } elseif (date("M") == "Jul") {
                                            $mes = "Julio";
                                        } elseif (date("M") == "Aug") {
                                            $mes = "Agosto";
                                        } elseif (date("M") == "Sep") {
                                            $mes = "Septiembre";
                                        } elseif (date("M") == "Oct") {
                                            $mes = "Octubre";
                                        } elseif (date("M") == "Nov") {
                                            $mes = "Noviembre";
                                        } elseif (date("M") == "Dec") {
                                            $mes = "Diciembre";
                                        }
                                    ?>
                                    <i class="material-icons left">today</i> <?php echo $dia." ".date("d")." de ".$mes." del ".date("Y"); ?>
                                </div>
                                <?php
                                    if (isset($_SESSION["pyme"])) {
                                        ?>
                                            <div class="col s12 m6 no-padding grey-text text-darken-1" id="pymeWrapper">
                                                <?php //echo (isset($_SESSION["verificada"]) && $_SESSION["verificada"] == 3) ? "<i class="material-icons right blue-text">verified</i>": ""; ?>
                                                <i class="material-icons right">store</i> <?php echo $_SESSION["pyme"]; ?>
                                            </div>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="row black-text" id="wrapperPrincipal"></div>
                            <div id="loader_wrapper_v2" class="hide">
                                <div id="loader_wrapper_interno" class="center valign-wrapper">
                                    <div class="center">
                                        <img src="../../img/logo-ceicol-simple.png" />
                                        <div class="preloader-wrapper big active">
                                            <div class="spinner-layer spinner-blue-only">
                                                <div class="circle-clipper left">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="gap-patch">
                                                    <div class="circle"></div>
                                                </div>
                                                <div class="circle-clipper right">
                                                    <div class="circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            //Scripts usados en la página
                function scripts($modulo) {
                    ?>
                        <script src="../../librerias/jquery.js"></script>
                        <script src="../../librerias/materialize.min.js"></script>
                        <script src="../../librerias/chart.min.js"></script>
                        <script src="../../librerias/sweetalert.min.js"></script>
                        <script src="../../librerias/highcharts.js"></script>
                        <script src="../../librerias/variable-pie.js"></script>
                        <script src="../../librerias/accessibility.js"></script>
                        <script src="../../js/<?php echo $modulo; ?>.js?id=<?php echo date("dmYHis"); ?>"></script>
                        <script src="../../js/varios.js"></script>   
                        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>                                    
                    <?php
                }
        }
    ?>