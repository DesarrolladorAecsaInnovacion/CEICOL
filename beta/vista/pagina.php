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
                        <ul id="slide-out" class="sidenav">
                            <div class="col s12 center">
                                <a href="index.php"><img src="img/logo.png"></a>
                            </div>
                            <li><div class="divider"></div></li>
                            <li class="center"><a href="index.php" class="bold waves-effect waves-dark">Inicio</a></li>
                            <li><div class="divider"></div></li>
                            <li class="center"><a href="#nosotros" id="enlace_nosotros" class="bold waves-effect waves-dark">Nosotros</a></li>
                            <li><div class="divider"></div></li>
                        </ul>
                        <div class="row no-margin">
                            <nav class="white">
                                <div class="nav-wrapper">
                                    <div class="hide-on-large-only center col s12 relative">
                                        <i class="material-icons sidenav-trigger absolute black-text waves-effect waves-dark" data-target="slide-out">menu</i>
                                        <a class="black-text bold uppercase waves-effect waves-dark" href="index.php"><img src="img/logo.png"></a>
                                    </div>
                                    <ul class="left hide-on-med-and-down">
                                        <li><a class="black-text bold uppercase waves-effect waves-dark" href="index.php"><img src="img/logo.png"></a></li>
                                        <li><a class="black-text bold uppercase waves-effect waves-dark" href="index.php"><span class="all-transitions">Inicio</span></a></li>
                                        <li><a class="black-text bold uppercase waves-effect waves-dark" href="#nosotros"><span class="all-transitions">Nosotros</span></a></li>
                                        <li class="hide"><a class="black-text bold uppercase waves-effect waves-dark" href="#!"><span class="all-transitions">Trabajos</span></a></li>
                                        <li class="hide"><a class="black-text bold uppercase waves-effect waves-dark" href="#!"><span class="all-transitions">Empresas</span></a></li>
                                    </ul>
                                    <ul class="hide right hide-on-med-and-down">
                                        <li><a class="black-text bold uppercase waves-effect waves-dark" href="#!"><span class="all-transitions">Iniciar sesión</span></a></li>
                                        <li><a class="naranja-cei-text bold uppercase waves-effect waves-dark" href="#!"><span class="all-transitions">Registrate</span></a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    <?php
                }
                function index() {
                    ?>
                        <div class="row">
                            <div class="parallax-container">
                                <div class="parallax">
                                    <img src="img/index/banner.jpg">
                                    <div class="absolute valign-wrapper">
                                        <div class="col s12 center no-padding">
                                            <h1 class="bold">
                                                <span class="white-text">¡Bienvenido(a)!</span>
                                                <br>
                                                <i class="material-icons large naranja-claro-cei-text">keyboard_arrow_down</i>
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 gris-medio-cei">
                                    <h6 class="center bold">Así funciona CEI</h6>
                                    <div class="col s12 m3 center">
                                        <i class="material-icons naranja-claro-cei-text medium">search</i>
                                        <p>
                                            Encuentra tu trabajo ideal
                                        </p>
                                    </div>
                                    <div class="col s12 m3 center">
                                        <i class="material-icons naranja-claro-cei-text medium">reviews</i>
                                        <p>
                                            Busca la empresa
                                        </p>
                                    </div>
                                    <div class="col s12 m3 center">
                                        <i class="material-icons naranja-claro-cei-text medium">price_check</i>
                                        <p>
                                            Compara salarios
                                        </p>
                                    </div>
                                    <div class="col s12 m3 center">
                                        <i class="material-icons naranja-claro-cei-text medium">work</i>
                                        <p>
                                            Aplica a la oferta
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="nosotros">
                            <div class="container">
                                <div class="col s12">
                                    <h4 id="titulo_nosotros" class="uppercase bold naranja-cei-text center">¿Quienes somos?</h4>
                                    <div class="col s12 m6 offset-m3 center">
                                        <p>
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates nobis beatae fugiat a recusandae quae. Cumque non optio nobis, sunt explicabo dolorem praesentium, rem fugiat repudiandae excepturi et unde incidunt.
                                        </p>
                                        <p class="bold">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates nobis beatae fugiat a recusandae quae. Cumque non optio nobis, sunt explicabo dolorem praesentium, rem fugiat repudiandae excepturi et unde incidunt.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="mision">
                            <div class="col s12 no-padding naranja-medio-cei valign-wrapper">
                                <div class="col s12 m6 no-padding no-line-height" id="wrapper_imagen_mision"></div>
                                <div class="col s12 m6">
                                    <h4 id="titulo_mision" class="uppercase bold white-text">Una nueva misión</h4>
                                    <p class="white-text">
                                        <span class="">Transformar vidas a través de oportunidades en el mundo laboral con calidad y eficiencia de estrategias innovadoras.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="vision">
                            <div class="col s12 no-padding valign-wrapper">
                                <div class="col s12 m6" id="wrapper_vision">
                                    <h4 id="titulo_vision" class="uppercase bold naranja-cei-text">Una nueva visión</h4>
                                    <p class="black-text">
                                        Ser en el 2026 lideres en la creación de oportunidades laborales con un modelo de gestión innovador y reconocido por su eficiencia, orientado a la excelencia
                                    </p>
                                </div>
                                <div class="col s12 m6 no-padding no-line-height valign-wrapper relative" id="wrapper_imagen_vision">
                                    <img src="img/nosotros/vision.jpg">
                                </div>
                            </div>
                        </div>
                        <div class="row" id="valores">
                            <div class="container">
                                <div class="col s12 no-padding">
                                    <h4 id="titulo_nuestros_valores" class="uppercase bold naranja-cei-text center gris-medio-cei">Nuestros Valores</h4>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">star</i> Estamos comprometidos con la excelencia.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">face_retouching_natural</i> Actuamos con transparencia.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">favorite</i> Tenemos pasión por los resultados.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">volunteer_activism</i> Amamos lo que hacemos.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">tips_and_updates</i> Somos innovadores.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">sentiment_satisfied</i> Todo lo que hacemos es el resultado de un trabajo de construcción para la vida.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">bolt</i> Somos eficientes y hacemos nuestro trabajo con ética.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">self_improvement</i> Tratamos a todos con respeto.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">engineering</i> Transferimos nuestra experiencia y conocimiento para crear soluciones creativas.
                                        </div>
                                    </div>
                                    <div class="col s12 m6 offset-m3 l6">
                                        <div class="col s12 bold item-nuestros-valores valign-wrapper">
                                            <i class="material-icons medium naranja-claro-cei-text left">groups</i> Somos empáticos.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col s12">
                                    <div class="col s12 center">
                                        <h4 id="titulo_nuestros_aliados" class="uppercase bold naranja-cei-text center gris-medio-cei">Nuestros Aliados</h4>
                                        <div class="col s12 no-padding valign-wrapper" id="wrapper_logos_empresas">
                                            <div class="col s12 m6 l3 center">
                                                <img src="img/index/logoAecsa.png" class="logo-empresas">
                                            </div>
                                            <div class="col s12 m6 l3 center">
                                                <img src="img/index/logoFlow.png" class="logo-empresas">
                                            </div>
                                            <div class="col s12 m6 l3 center">
                                                <img src="img/index/logoReal.png" class="logo-empresas">
                                            </div>
                                            <div class="col s12 m6 l3 center">
                                                <img src="img/index/logoMamba.png" class="logo-empresas">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                function footer() {
                    ?>
                        <footer class="page-footer">
                            <div class="footer-copyright">
                                <div class="container">
                                    <div class="row">
                                        <div class="col s12 m4 wrapper-datos-footer">
                                            <div class="col s12 black-text">
                                                <p class="bold">CEI</p>
                                                <p>
                                                    <a href="index.php" class="black-text waves-effect waves-dark">Inicio</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col s12 m4 wrapper-datos-footer">
                                            <div class="col s12 black-text">
                                                <p class="bold">Nosotros</p>
                                                <p>
                                                    <a href="#mision" class="black-text waves-effect waves-dark">Nuestra misión</a>
                                                    <br>
                                                    <a href="#vision" class="black-text waves-effect waves-dark">Nuestra visión</a>
                                                    <br>
                                                    <a href="#valores" class="black-text waves-effect waves-dark">Nuestros valores</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col s12 m4 wrapper-datos-footer">
                                            <div class="col s12 black-text">
                                                <p class="bold">Políticas</p>
                                                <p>
                                                    <a href="archivos/politica-sistema-integrado-gestion.pdf" target="_BLANK" class="black-text all-transitions">Política del sistema integrado de gestion</a>
                                                    <br>
                                                    <a href="archivos/politica-tratamiento-de-datos.pdf" target="_BLANK" class="black-text all-transitions">Política de tratamiento de datos</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row hide" id="politicas_wrapper">
                                        <div class="col s12 m6 center">
                                            <a href="archivos/politica-sistema-integrado-gestion.pdf" target="_BLANK" class="black-text all-transitions">Política del sistema integrado de gestion</a>
                                        </div>
                                        <div class="col s12 m6 center">
                                            <a href="archivos/politica-tratamiento-de-datos.pdf" target="_BLANK" class="black-text all-transitions">Política de tratamiento de datos</a>
                                        </div>
                                    </div>
                                    <div class="row no-margin">
                                        <div class="col s12 center">
                                            <a target="_blank" href="https://www.tiktok.com/@cei_empresarial" class="btn-flat waves-effect waves-light black"><i class="material-icons fa-brands fa-tiktok white-text"></i></a>
                                            <a target="_blank" href="https://www.linkedin.com/in/cei-empresarial-sas-810904252/?originalSubdomain=co&original_referer=" class="btn-flat waves-effect waves-light black"><i class="material-icons fa-brands fa-linkedin white-text"></i></a>
                                            <a target="_blank" href="https://www.instagram.com/cei.empresarial/" class="btn-flat waves-effect waves-light black"><i class="material-icons fa-brands fa-instagram white-text"></i></a>
                                            <a target="_blank" href="https://www.youtube.com/channel/UC1D8iNgkiCK-CQLyhFb-WjQ" class="btn-flat waves-effect waves-light black"><i class="material-icons fa-brands fa-youtube white-text"></i></a>
                                            <a target="_blank" href="https://twitter.com/cei_empresarial" class="btn-flat waves-effect waves-light black"><i class="material-icons fa-brands fa-twitter white-text"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <div class="row no-margin">
                            <div class="col s12 center">
                                Copyright © <?php echo date('Y'); ?> - CEI
                            </div>
                        </div>
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