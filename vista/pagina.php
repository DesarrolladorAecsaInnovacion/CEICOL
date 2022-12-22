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
                            <li class="center"><a href="index.php#nosotros" id="enlace_nosotros" class="bold waves-effect waves-dark">Nosotros</a></li>
                            <li><div class="divider"></div></li>
                            <li class="center"><a href="servicios.php" class="bold waves-effect waves-dark">Servicios</a></li>
                            <li><div class="divider"></div></li>
                            <li class="center"><a href="contacto.php" class="bold waves-effect waves-dark">Contacto</a></li>
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
                                        <li><a class="black-text bold uppercase waves-effect waves-dark active" href="index.php"><span class="all-transitions">Inicio</span></a></li>
                                        <li><a class="black-text bold uppercase waves-effect waves-dark" href="index.php#nosotros"><span class="all-transitions">Nosotros</span></a></li>
                                        <li><a class="black-text bold uppercase waves-effect waves-dark" href="servicios.php"><span class="all-transitions">Servicios</span></a></li>
                                        <li><a class="black-text bold uppercase waves-effect waves-dark" href="contacto.php"><span class="all-transitions">Contacto</span></a></li>
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
                                    <div class="col s12 l6 offset-l3 center">
                                        <p>
                                            Somos una empresa especialista en procesos de selección de personal. Brindamos soluciones completas, eficientes y de calidad a complejos retos de negocio en la selección y suministro del recurso humano de acuerdo a las diversas necesidades de nuestros clientes.
                                        </p>
                                        <p class="bold">
                                            Creemos que una organización tiene la capacidad de transformarse a sí misma, si comprende la necesidad de realizar ajustes en algunas de sus prácticas culturales, es por eso que algunos de nuestros servicios son: Formación, Consultoría, Outsourcing de Nómina Salud y Seguridad Laboral, Selección y Evaluación de Personal.
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
                                <div class="col s12 no-padding">
                                    <div class="col s12 center no-padding">
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
                function servicios() {
                    ?>
                        <div class="row">
                            <div class="parallax-container">
                                <div class="parallax">
                                    <img src="img/servicios/banner.jpg">
                                    <div class="absolute valign-wrapper">
                                        <div class="col s12 center no-padding">
                                            <h3 class="uppercase">
                                                <span class="white-text">Nos especializamos<br><span class="bold">en procesos de selección<br>de personal.</span></span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col s12">
                                    <h6 class="center bold">Así funciona CEI</h6>
                                    <div class="col s12 l6 offset-l3 center">
                                        <p>
                                            Brindamos soluciones completas a complejos retos de negocio, eficientes y de calidad en la selección y suministro del recurso humano para las diversas necesidades de nuestros clientes.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 naranja-cei white-text">
                                    <h5 class="center bold uppercase">Servicios</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 xl6 offset-xl3 center no-padding">
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="col s12 no-padding">
                                                <a href="#formacion" class="waves-effect waves-light"><img src="img/servicios/formacion.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="col s12 no-padding">
                                                <a href="#seleccion" class="waves-effect waves-light"><img src="img/servicios/seleccion.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="col s12 no-padding">
                                                <a href="#evaluaciones" class="waves-effect waves-light"><img src="img/servicios/evaluacion.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="col s12 no-padding">
                                                <a href="#consultoria" class="waves-effect waves-light"><img src="img/servicios/consultoria.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col s6">
                                            <div class="col s12 no-padding">
                                                <a href="#estrategia" class="waves-effect waves-light"><img src="img/servicios/outsourcing.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col s6">
                                            <div class="col s12 no-padding">
                                                <a href="#sistema" class="waves-effect waves-light"><img src="img/servicios/salud.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="formacion">
                            <div class="container">
                                <div class="col s12 no-padding gris-medio-cei valign-wrapper relative wrapper-tarjeta-servicios">
                                    <div class="col s12 l6 wrapper-texto-servicios no-padding">
                                        <h5 class="uppercase bold naranja-cei-text no-margin naranja-mas-claro-cei absolute">Formación <i class="material-icons">arrow_drop_down</i></h5>
                                        <p class="no-margin">
                                            Identificamos las necesidades de capacitación que requiere la compañía, a través de encuestas y evaluaciones de desempeño que realizamos a los empleados, <b>ejecutando un análisis para potenciar las habilidades de cada persona y proporcionando las herramientas para el seguimiento por parte de los jefes inmediatos y el departamento de recursos humanos.</b>
                                            <br><br>
                                            <a href="#!" class="btn-small btn-flat waves-effect waves-light naranja-cei white-text bold">Contáctanos</a>
                                        </p>
                                    </div>
                                    <div class="col s12 l6 no-padding no-line-height wrapper-imagen-servicios relative" id="wrapper_imagen_servicios_formacion"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="seleccion">
                            <div class="container">
                                <div class="col s12 naranja-mas-claro-cei no-padding">
                                    <div class="col s12 l6 offset-l6 no-padding">
                                        <h5 class="uppercase bold naranja-cei-text titulo-completo-servicios">Selección de personal <i class="material-icons">arrow_drop_down</i></h5>
                                    </div>
                                </div>
                                <div class="col s12 no-padding gris-medio-cei valign-wrapper relative wrapper-tarjeta-servicios">
                                    <div class="col s12 l6 no-padding no-line-height wrapper-imagen-servicios" id="wrapper_imagen_servicios_seleccion"></div>
                                    <div class="col s12 l6 wrapper-texto-servicios wrapper-texto-servicios-completo no-padding">
                                        <p class="no-margin">
                                            Actualmente no solo debemos preocuparnos por contar con los mejores profesionales, también debemos preocuparnos porque estos realmente les den valor a nuestras organizaciones.
                                            <br><br>
                                            <span class="bold uppercase">¿NUESTROS MÉTODOS?</span>
                                            <br><br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Levantamiento presencial del perfil.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Reclutamiento.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Aplicación de pruebas psicotécnicas.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Entrevistas.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Verificación de referencias.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Informe de selección.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Manejo y disponibilidad de reemplazos.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Capacitaciones técnicas con bajo costo en temas relacionados con servicio al cliente, protocolo, proyecto de vida entre otros, en coordinación con el cliente.
                                            <br><br>
                                            <span class="bold uppercase">La Selección se efectúa de acuerdo con los parámetros determinados en la orden de vinculación emitida por la empresa cliente.</span>
                                            <br><br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Búsqueda y selección de candidatos.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Firma y legalización de los contratos de los trabajadores.
                                            <br><br>
                                            (Se efectúa de acuerdo con los parámetros determinados en la orden de vinculación emitida por la empresa cliente).
                                            <br><br>
                                            <span class="bold uppercase">Realizamos un proceso de preselección, selección y reclutamiento detallado.</span>
                                            <br><br>
                                            Además de las competencias laborales los candidatos cuentan con:
                                            <br><br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Excelente presentación personal.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Conocimiento de funciones.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Estabilidad laboral.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Documentos vigentes.<br>
                                            <br><br>
                                            <a href="#!" class="btn-small btn-flat waves-effect waves-light naranja-cei white-text bold">Contáctanos</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 no-padding wrapper-metodologia">
                                    <div class="col s12 no-padding center relative">
                                        <h5 class="uppercase bold naranja-cei-text no-margin">Nuestra metodología</h5>
                                        <div id="divider_metodologia"></div>
                                        <div class="col s12 no-padding relative">
                                            <div class="col s12 m6 l3">
                                                <div class="col s12">
                                                    <a href="#!" class="btn-small btn-flat no-cursor naranja-cei white-text bold">Insights</a>
                                                    <p>
                                                        Preparar toda la información del contexto para crear un plan de acción acorde a las necesidades.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col s12 m6 l3">
                                                <div class="col s12">
                                                    <a href="#!" class="btn-small btn-flat no-cursor naranja-cei white-text bold">Estrategia</a>
                                                    <p>
                                                        Co-crear la ruta estratégica que debemos seguir, para abarcar con eficiencia los objetivos propuestos.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col s12 m6 l3">
                                                <div class="col s12">
                                                    <a href="#!" class="btn-small btn-flat no-cursor naranja-cei white-text bold">Despliegue</a>
                                                    <p>
                                                        A través de acompañamiento de profesionales expertos, se realizará el despliegue estratégico de las iniciativas.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col s12 m6 l3">
                                                <div class="col s12">
                                                    <a href="#!" class="btn-small btn-flat no-cursor naranja-cei white-text bold">Escalado</a>
                                                    <p>
                                                        Usar el conocimiento adquirido para escalarlo y lograr una verdadera transformación cultural en toda la organización.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="evaluaciones">
                            <div class="container">
                                <div class="col s12 no-padding gris-medio-cei valign-wrapper relative wrapper-tarjeta-servicios">
                                    <div class="col s12 l6 wrapper-texto-servicios no-padding">
                                        <h5 class="uppercase bold naranja-cei-text no-margin naranja-mas-claro-cei absolute">Evaluaciones especializadas <i class="material-icons">arrow_drop_down</i></h5>
                                        <p class="no-margin">
                                            Estas evaluaciones están orientadas a profundizar en detalle las competencias, habilidades, y personalidad de los candidatos, de acuerdo con el cargo y su nivel de impacto en la organización.
                                            <br><br>
                                            <span class="bold naranja-cei-text uppercase">Headhunting</span>
                                            <br><br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Reclutamiento de perfiles de alto nivel.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Evaluación integral de talento directivo.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Entrevista a profundidad especializada en cargos gerenciales.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Informe especializado de potencial de desarrollo.
                                            <br><br>
                                            <a href="#!" class="btn-small btn-flat waves-effect waves-light naranja-cei white-text bold">Contáctanos</a>
                                        </p>
                                    </div>
                                    <div class="col s12 l6 no-padding no-line-height wrapper-imagen-servicios" id="wrapper_imagen_servicios_evaluaciones"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="consultoria">
                            <div class="container">
                                <div class="col s12 naranja-mas-claro-cei no-padding">
                                    <div class="col s12 l6 offset-l6 no-padding">
                                        <h5 class="uppercase bold naranja-cei-text titulo-completo-servicios">Consultoría <i class="material-icons">arrow_drop_down</i></h5>
                                    </div>
                                </div>
                                <div class="col s12 no-padding gris-medio-cei valign-wrapper relative wrapper-tarjeta-servicios">
                                    <div class="col s12 l6 no-padding no-line-height wrapper-imagen-servicios" id="wrapper_imagen_servicios_consultoria"></div>
                                    <div class="col s12 l6 wrapper-texto-servicios wrapper-texto-servicios-completo no-padding">
                                        <p class="no-margin" id="detalles_consultoria">
                                            <span class="bold uppercase">Valoración del capital humano.</span>
                                            <br><br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Estudio de clima Laboral / Evaluación por competencias.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Assessment Center potencial / Selección.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Sistema 360° de Evaluación / Objetivos Competencias.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Plataforma de evaluaciones / Desempeño – Objetivos.
                                            <br><br>
                                            <span class="bold uppercase">DESARROLLO Y RR.HH.</span>
                                            <br><br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Descripción de puestos de trabajo - Perfiles<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Programa de Identificación de potenciales.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Modelo de identificacion de competencias.
                                            <br><br>
                                            <span class="bold uppercase naranja-cei-text">RECURSOS HUMANOS IDEAL:</span>
                                            <br><br>
                                            <span class="naranja-cei-text bold left"><i class="material-icons">remove</i></span><span class="bold uppercase">SOCIAL ESTRATÉGICO</span>
                                            <br>
                                            Administración de recursos humanos estratégicos.
                                            <br><br>
                                            <span class="naranja-cei-text bold left"><i class="material-icons">remove</i></span><span class="bold uppercase">ADALID DE LOS EMPLEADOS</span>
                                            <br>
                                            Administración de la contribución de los empleados.
                                            <br><br>
                                            <span class="naranja-cei-text bold left"><i class="material-icons">remove</i></span><span class="bold uppercase">EXPERTO ADMINISTRATIVO</span>
                                            <br>
                                            Administración de la infraestructura.
                                            <br><br>
                                            <span class="naranja-cei-text bold left"><i class="material-icons">remove</i></span><span class="bold uppercase">AGENTE DE CAMBIO</span>
                                            <br>
                                            Administración de la transformación y el cambio.
                                            <br><br>
                                            <a href="#!" class="btn-small btn-flat waves-effect waves-light naranja-cei white-text bold">Contáctanos</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="estrategia">
                            <div class="container">
                                <div class="col s12 no-padding gris-medio-cei valign-wrapper relative wrapper-tarjeta-servicios">
                                    <div class="col s12 l6 wrapper-texto-servicios no-padding">
                                        <h5 class="uppercase bold naranja-cei-text no-margin naranja-mas-claro-cei absolute">Estrategia organizacional <i class="material-icons">arrow_drop_down</i></h5>
                                        <p class="no-margin">
                                            <span class="bold naranja-cei-text">&#x2022;</span> <b>Outsourcing de recursos humanos.</b><br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Programas de responsabilidad social corporativa.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Desvinculación laboral asistida.<br>
                                            <span class="bold naranja-cei-text">&#x2022;</span> Estudios salariales y de Mercado.
                                            <br><br>
                                            <a href="#!" class="btn-small btn-flat waves-effect waves-light naranja-cei white-text bold">Contáctanos</a>
                                        </p>
                                    </div>
                                    <div class="col s12 l6 no-padding no-line-height wrapper-imagen-servicios" id="wrapper_imagen_servicios_estrategia"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 no-padding wrapper-metodologia">
                                    <div class="col s12 no-padding center relative">
                                        <div class="col s12 no-padding relative">
                                            <div class="col s12 m6 l3 offset-l3">
                                                <div class="col s12">
                                                    <a href="#!" class="btn-small btn-flat no-cursor naranja-cei white-text bold">Ejes de</a>
                                                    <br>
                                                    <span class="uppercase naranja-cei-text bold">Intervención</span>
                                                    <br><br>
                                                    <p class="left-align relative">
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Capacidades</b><br><br>
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Conectividad</b><br><br>
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Cultura</b><br><br>
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Costo</b>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col s12 m6 l3">
                                                <div class="col s12">
                                                    <a href="#!" class="btn-small btn-flat no-cursor naranja-cei white-text bold">Ejes</a>
                                                    <br>
                                                    <span class="uppercase naranja-cei-text bold">Estratégicos</span>
                                                    <br><br>
                                                    <p class="left-align relative">
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Liderazgo</b><br><br>
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Habilidades técnicas</b><br><br>
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Comportamientos y habilidades blandas</b><br><br>
                                                        <span class="naranja-cei-text bold"><i class="material-icons">remove</i></span> <b class="uppercase">Gerencia organizacional de proyectos</b>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col s12 m6 offset-m3 center">
                                                <p>
                                                    Creemos que una organización tiene la capacidad de transformarse a si misma, si comprende la necesidad de realizar ajustes en algunas de sus prácticas culturales.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" id="sistema">
                            <div class="container">
                                <div class="col s12 naranja-mas-claro-cei no-padding">
                                    <div class="col s12 l6 offset-l6 no-padding">
                                        <h5 class="uppercase bold naranja-cei-text titulo-completo-servicios">SISTEMA DE GESTIÓN DE SEGURIDAD Y SALUD EN EL TRABAJO <i class="material-icons">arrow_drop_down</i></h5>
                                    </div>
                                </div>
                                <div class="col s12 no-padding gris-medio-cei valign-wrapper relative wrapper-tarjeta-servicios">
                                    <div class="col s12 l6 no-padding no-line-height wrapper-imagen-servicios" id="wrapper_imagen_servicios_sistema"></div>
                                    <div class="col s12 l6 wrapper-texto-servicios wrapper-texto-servicios-completo no-padding">
                                        <p class="no-margin">
                                            <br><br>
                                            <span class="naranja-cei-text bold">&#x2022;</span> Selección y evaluación especializada de personal del sector salud y riesgos profesionales.
                                            <br><br>
                                            <span class="naranja-cei-text bold">&#x2022;</span> Tercerización de personal destacado en áreas de salud y riesgos profesionales.<br><br>
                                            <span class="naranja-cei-text bold">&#x2022;</span> Evaluaciones médicas ocupacionales de ingreso, periódicas y de retiro.
                                            <br><br>
                                            <span class="naranja-cei-text bold">&#x2022;</span> Consultoría en el programa de vigilancia epidemiológica y prevención de psicosocial.
                                            <br><br>
                                            <span class="bold uppercase naranja-cei-text">El capital humano es el recurso más importante de su organización.</span>
                                            <br><br>
                                            <a href="#!" class="btn-small btn-flat waves-effect waves-light naranja-cei white-text bold">Contáctanos</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                }
                function contacto() {
                    ?>
                        <div class="row">
                            <div class="container">
                                <div class="col s12 no-padding" id="contacto_wrapper">
                                    <h5 class="center bold uppercase naranja-mas-claro-cei naranja-cei-text no-margin" id="titulo_contacto">Contactanos</h5>
                                    <div class="row">
                                        <div class="col s12 valign-wrapper no-padding" id="formulario_contacto_wrapper">
                                            <div class="col s6 hide-on-med-and-down">
                                                <img src="img/servicios/seleccion-sin-texto.jpg" draggable="false">
                                            </div>
                                            <div class="col s12 l6">
                                                <p class="center">
                                                    Puedes contactarnos por medio del siguiente formulario:
                                                </p>
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">person</i>
                                                    <input id="nombre" type="text" class="validate" required>
                                                    <label for="nombre" class="bold">Nombre</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">email</i>
                                                    <input id="correo" type="email" class="validate" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
                                                    <label for="correo" class="bold">Correo</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">phone_iphone</i>
                                                    <input id="telefono" type="number" class="validate" min="3000000000" max="3999999999"  required>
                                                    <label for="telefono" class="bold">Teléfono</label>
                                                </div>
                                                <div class="input-field col s12">
                                                    <i class="material-icons prefix">comment</i>
                                                    <textarea id="mensaje" class="materialize-textarea" required data-length="120"></textarea>
                                                    <label for="mensaje" class="bold">Mensaje</label>
                                                </div>
                                                <div class="col s12 center" style="position: relative;">
                                                    <div id="captcha_wrapper_contacto"></div>
                                                    <br><br>
                                                </div>
                                                <div class="col s12">
                                                    <p class="center">
                                                        <button id="enviar" class="btn-large waves-effect waves-light bold pulse naranja-cei">Enviar<i class="material-icons right">keyboard_arrow_right</i></button>
                                                    </p>
                                                </div>
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
                                                    <a href="index.php#mision" class="black-text waves-effect waves-dark">Nuestra misión</a>
                                                    <br>
                                                    <a href="index.php#vision" class="black-text waves-effect waves-dark">Nuestra visión</a>
                                                    <br>
                                                    <a href="index.php#valores" class="black-text waves-effect waves-dark">Nuestros valores</a>
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
                        <script src="<?php echo $ubicacion; ?>librerias/sweetalert.min.js"></script>
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