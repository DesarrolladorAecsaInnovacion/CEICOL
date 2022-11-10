<?php
        //Timezone
        //Conexión
            require "consultas.php";
        //Modelo
            class indexModelo {
                function __construct() {
                    $this->consulta = new consultas();                    
                }
                //Iniciar Sesión
                    function iniciar_sesion() {
                        /*$url = "https://www.google.com/recaptcha/api/siteverify";
    
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_URL, $url);
                        curl_setopt($curl, CURLOPT_HEADER, 0);
                        curl_setopt($curl, CURLOPT_POST, true);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
                        $data = [
                            "secret" => "6Lcqo9gfAAAAADb5R81q05A4Q0Dj1Kai1afl5O90",
                            "response" => $_POST["data"]["captcha"],
                            "remoteip" => $_SERVER["REMOTE_ADDR"],
                        ];
    
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    
                        $resp = json_decode(curl_exec($curl));
                        curl_close($curl);
                        if ($resp->success) {*/
                        if (true) {
                            //Ejemplo para inicio de sesion
                                $campos = "`id`, `correo`, `contrasena`";
                                $tabla = "`ceicol`.`usuarios`";
                                $condiciones = "WHERE `correo` = '".$_POST["data"]["correo"]."'";
                                $result = $this->consulta->generica("select", $campos, $tabla, $condiciones);
                                
                                if ($result->num_rows > 0) {
                                    $usuario = array();
                                    while($row = $result->fetch_assoc()) {
                                        array_push($usuario, $row);
                                    }
                                    if (password_verify($_POST["data"]["contrasena"], $usuario[0]["contrasena"])) {
                                        //Creamos las variables en sesion
                                        $_SESSION["id"] = $usuario[0]["id"];
                                        $_SESSION["correo"] = $usuario[0]["correo"];                         
                                        //Bandera de inicio de sesión
                                            /*$campos = "`inicio_sesion` = 1";
                                            $tabla = "`colaboradores_pymes`";
                                            $condiciones = "WHERE `id_colaboradores_pymes` = " . $_SESSION["id_usuario"];
                                            $this->consulta->generica("update", $campos, $tabla, $condiciones);*/
                                        //Reinicio de la fecha de inactividad
                                            /*$campos = "`fecha_aviso_inactividad` = NULL";
                                            $tabla = "`pymes`";
                                            $condiciones = "WHERE `id_pymes` = " . $pyme[0]["id_pymes"];
                                            $this->consulta->generica("update", $campos, $tabla, $condiciones);*/
                                        //Ingresa el log de los usuarios
                                            /*$campos = ($tipo_usuario == "colaborador") ? "fk_id_colaboradores_pymes, fecha_hora, ip" : "fk_id_administradores_newway, fecha_hora, ip";
                                            $tabla = "`logs_inicio_sesion`";
                                            $condiciones = $_SESSION["id_usuario"].", "".date("Y-m-d H:i:s")."", "".$_SERVER["REMOTE_ADDR"].""";
                                            $result = $this->consulta->generica("insert", $campos, $tabla, $condiciones);*/
                                        echo 1;
                                    } else {
                                        echo 2;
                                    }
                                } else {
                                    echo 0;
                                }
                        } else {
                            echo 3;
                        }
                    }
                }