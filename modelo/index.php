<?php
    //Conexión
        require "consultas.php";
    //Modelo
        class indexModelo {
            function __construct() {
                $this->consulta = new consultas();                    
            }
            //Contacto
                function enviarContacto() {
                    $url = "https://www.google.com/recaptcha/api/siteverify";

                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_HEADER, 0);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    $data = [
                        'secret' => '6LdWr2AjAAAAAM_rIYO3S8SgOCiizgvG19o0TTUp',
                        'response' => $_POST['data']['captcha'],
                        'remoteip' => $_SERVER['REMOTE_ADDR'],
                    ];

                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                    $resp = json_decode(curl_exec($curl));
                    curl_close($curl);

                    if ($resp->success) {
                        $contenido = '
                            <br>
                            <p style="text-align: center;">
                                <img src="https://cei.net.co/img/logo.png" style="height: 100px;max-width: 100%;">
                            </p>
                            <p style="background: #1d1d1b;color: #f4eee5;font-size: 2em;text-align: center;padding:20px;margin-bottom: 0;">
                                <b>¡Nuevo contacto!<br>Desde la página web</b>
                            </p>
                            <div style="background: #f4eee5;padding-left:20px;padding-right:20px;">
                                <p style="color: #1d1d1b !important;text-align: justify;padding-left:20px;padding-right:20px;margin-top:0;">
                                    <br>
                                    <p style="color: #1d1d1b !important;text-align: center;font-size: 1.5em;">
                                        <b>Los datos ingresados son:</b>
                                        <br><br>
                                    </p>
                                    <p style="color: #1d1d1b !important;border-bottom: 1px solid #1d1d1b;text-align: justify;">
                                        <b>Nombre:</b>
                                        <br>
                                        '.$_POST['data']['nombre'].'
                                        <br>
                                    </p>
                                    <p style="color: #1d1d1b !important;border-bottom: 1px solid #1d1d1b;text-align: justify;">
                                        <b>E-mail:</b>
                                        <br>
                                        '.$_POST['data']['correo'].'
                                        <br>
                                    </p>
                                    <p style="color: #1d1d1b !important;border-bottom: 1px solid #1d1d1b;text-align: justify;">
                                        <b>Teléfono:</b>
                                        <br>
                                        '.$_POST['data']['telefono'].'
                                        <br>
                                    </p>
                                    <p style="color: #1d1d1b !important;border-bottom: 1px solid #1d1d1b;text-align: justify;">
                                        <b>Mensaje:</b>
                                        <br>
                                        '.nl2br($_POST['data']['mensaje']).'
                                        <br>
                                    </p>
                                    <p style="color: #1d1d1b !important;text-align: center;">
                                        <br>
                                        <b>CEI Empresarial S.A.S ©'.date('Y').'</b>
                                    </p>
                                    <br>
                                    <br>
                                </p>
                            </div>
                        ';
                        //$destinatario = 'letstalk@theflowarchitects.com';
                        $destinatario = 'desarrollador@aecsa.company';
                        $asunto = 'Nuevo contacto desde la página web';
                        $remitente = 'CEI Empresarial S.A.S';
                        if ($this->consulta->enviar($remitente, $destinatario, $asunto, $contenido, 0)) {
                            echo 1;
                        } else {
                            echo 0;
                        }
                    } else {
                        echo 0;
                    }
                }
        }
?>