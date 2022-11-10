<?php
        class pagina {
            //Estructura básica común entre páginas
                function head($titulo_pagina, $descripcion_pagina, $direccion, $keywords, $ubicacion) {
                    if ($ubicacion == "interno") {
                        $ubicacion = "../";
                    } else {
                        $ubicacion = "";
                    }
                    ?>
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
                        <title><?php echo $titulo_pagina; ?></title>
                        <meta name="description" content="<?php echo $descripcion_pagina; ?>">
                        <meta name="keywords" content="<?php echo $keywords; ?>"/>
                        <!-- <meta name="facebook-domain-verification" content="61cqadl16k3l8nf4tfm7edssutyjsa" /> -->
                        <link rel="stylesheet" href="<?php echo $ubicacion; ?>librerias/materialize.min.css">
                        <link href="<?php echo $ubicacion; ?>librerias/material-icons.css" rel="stylesheet">
                        <link href="<?php echo $ubicacion; ?>css/index.css?id=<?php echo date("dmYHis"); ?>" rel="stylesheet">
                        <link rel="icon" type="image/x-icon" href="<?php echo $ubicacion; ?>img/favicon.ico">
                        <meta name="author" content="Victor Manuel Hernandez (vimahemo@gmail.com), Diego Rodríguez Veloza (rodvel2910@icloud.com)" />
                        <meta name="copyright" content="ceicol" />
                        <meta name="robots" content="index"/>
                        <meta name="robots" content="follow"/>
                        <!-- <meta http-equiv="cache-control" content="no-cache"/>
                        <meta http-equiv="expires" content="0"/> -->
                        <meta property="og:title" content="<?php echo $titulo_pagina; ?>" />
                        <meta property="og:description" content="<?php echo $descripcion_pagina; ?>" />
                        <meta property="og:type" content="website" />
                        <meta property="og:url" content="<?php echo $direccion; ?>" />
                        <!-- <meta property="og:image" content="https://ia.media-imdb.com/images/rock.jpg" /> -->
                        <link href="<?php echo $direccion; ?>" rel="canonical">
                        <!-- Meta Pixel Code -->
                        <script>
                        /*!function(f,b,e,v,n,t,s)
                        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version="2.0";
                        n.queue=[];t=b.createElement(e);t.async=!0;
                        t.src=v;s=b.getElementsByTagName(e)[0];
                        s.parentNode.insertBefore(t,s)}(window, document,"script",
                        "https://connect.facebook.net/en_US/fbevents.js");
                        fbq("init", "868106367137331");
                        fbq("track", "PageView");*/
                        </script>
                        <!-- <noscript><img alt="Meta Pixel Code" height="1" width="1" class="hide"
                        src="https://www.facebook.com/tr?id=868106367137331&ev=PageView&noscript=1"
                        /></noscript> -->
                        <!-- End Meta Pixel Code -->
                        <!-- Google Tag Manager -->
                        <script>/*(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({"gtm.start":
                        new Date().getTime(),event:"gtm.js"});var f=d.getElementsByTagName(s)[0],
                        j=d.createElement(s),dl=l!="dataLayer"?"&l="+l:"";j.async=true;j.src=
                        "https://www.googletagmanager.com/gtm.js?id="+i+dl;f.parentNode.insertBefore(j,f);
                        })(window,document,"script","dataLayer","GTM-N87ZVQ2");*/</script>
                        <!-- End Google Tag Manager -->
                    <?php
                }
                function nav() {
                    ?>
                        <div class="row">
                            <nav class="blue-grey darken-4">
                                <div class="nav-wrapper">
                                    <a href="#" class="brand-logo center">Logo</a>
                                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                                        <li><a href="sass.html">Sass</a></li>
                                        <li><a href="badges.html">Components</a></li>
                                        <li><a href="collapsible.html">JavaScript</a></li>
                                    </ul>
                                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                                        <li><a href="sass.html">Sass</a></li>
                                        <li><a href="badges.html">Components</a></li>
                                        <li><a href="collapsible.html">JavaScript</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    <?php
                }
                function index() {
                    ?>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 white-text">
                                    <h6 class="center"><b>¡Bienvenido!</b></h6>
                                    <p class="col s12 center">
                                        Sitio configurado correctamente.
                                    </p>
                                    <p class="col s12 center">
                                        <u>Para ir a la página de inicio de sesión:</u>
                                    </p>
                                    <p class="col s12 center">
                                        <a href="iniciar.php" class="btn-large blue-grey lighten-3 blue-grey-text text-darken-4 waves-effect waves-dark white-text"><b>Haz clic aqui <i class="material-icons right blue-grey-text text-darken-4">keyboard_arrow_right</i></b></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                function footer() {
                    ?>
                        <footer class="page-footer blue-grey darken-4">
                            <div class="footer-copyright">
                                <div class="container center">
                                    <b>© 2022</b>
                                </div>
                            </div>
                        </footer>
                    <?php
                }
            //Scripts usados en la página
                function scripts($ubicacion, $captcha) {
                    if ($ubicacion == "interno") {
                        $ubicacion = "../";
                    } else {
                        $ubicacion = "";
                    }
                    ?>
                        <script src="<?php echo $ubicacion; ?>librerias/jquery.js"></script>
                        <script src="<?php echo $ubicacion; ?>librerias/materialize.min.js"></script>
                        <script src="<?php echo $ubicacion; ?>librerias/fontawesome.js"></script>
                        <script src="<?php echo $ubicacion; ?>js/index.js?id=<?php echo date("dmYHis"); ?>"></script>
                        <?php
                            if ($captcha) {
                                ?>
                                    <script src="https://www.google.com/recaptcha/api.js?onload=CaptchaCallback&render=explicit"></script>
                                <?php
                            }
                        ?>
                    <?php
                }
                function iniciar() {
                    ?>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 white-text">
                                    <h6 class="center"><b>Iniciar sesión</b></h6>
                                    <p class="col s12 center">
                                        A continuación ingresa con tus credenciales
                                    </p>
                                    <div class="input-field col s12">
                                        <input id="correo" type="text" class="validate" required>
                                        <label for="correo"><b class="white-text">Correo electrónico</b></label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="contrasena" type="password" class="validate" required>
                                        <label for="contrasena"><b class="white-text">Contraeña</b></label>
                                    </div>
                                    <p class="col s12 center">
                                        <button id="entrar" class="btn-large blue-grey lighten-3 blue-grey-text text-darken-4 waves-effect waves-dark white-text"><b>Entrar <i class="material-icons right blue-grey-text text-darken-4">keyboard_arrow_right</i></b></button>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
        }
    ?>