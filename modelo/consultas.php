<?php
    //Este archivo contiene las consultas dinámicas a la base de datos, realizar el envío de correos, las consultas a webservices
    ini_set('max_execution_time', 2000);
    require 'conexion.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    //Consultas dinámicas
        class consultas {
            function __construct() {
                date_default_timezone_set('America/Bogota');
                @\session_start();
            }
            function generica($tipo, $campos, $tabla, $condiciones) {
                $conn = new conexion();
                $conn = $conn->conexion();
                $conn -> set_charset("utf8");
                $sql = '';
                if($tipo == 'select') {
                    $sql = "SELECT ".$campos." FROM ".$tabla." ".$condiciones;
                } elseif($tipo == 'select_alternativo') {
                    $sql = "SELECT ".$campos." FROM ".$tabla." ".$condiciones;
                    $result = $conn->query($sql);
                    $array = array();
                    while ($row = $result->fetch_assoc()) {
                        array_push($array, $row);
                    }
                    return $array;
                } elseif($tipo == 'insert') {
                    $sql = "INSERT INTO ".$tabla."(".$campos.") VALUES (".$condiciones.")";
                } elseif($tipo == 'insert_multiple') {
                    $sql = "INSERT INTO ".$tabla."(".$campos.") VALUES ".$condiciones;
                } elseif($tipo == 'update') {
                    $sql = "UPDATE ".$tabla." SET ".$campos." ".$condiciones;
                } elseif($tipo == 'delete') {
                    $sql = "DELETE FROM ".$tabla." ".$condiciones;
                } elseif($tipo == 'alter') {
                $sql = "ALTER TABLE ".$tabla." ".$condiciones;
                } elseif($tipo == 'truncate') {
                $sql = "TRUNCATE TABLE ".$tabla." ".$condiciones;
                } elseif($tipo == 'selectunion') {
                    $sql = "SELECT ".$campos." FROM ".$condiciones;
                }
                /*?>
                <script>console.log('<?php echo $sql.'</br>';?>');</script>
                <?php
                /*print_r($sql);echo '</br>';
                ?>
                <script>alert('<?php echo $sql.'</br>';?>');</script>
                <?php*/
                return $conn->query($sql);
            }
            function verificarCelularesCargue($campo, $tabla){
                $campos = "COUNT(CHARACTER_LENGTH(`".$campo."`)) AS TOTAL";                
                $total = array();
                $condiciones = "WHERE CHARACTER_LENGTH(`".$campo."`)<>10 OR telefono NOT LIKE '3%'";
                $result = $this->generica('select', $campos, $tabla, $condiciones);
                while ($row = $result->fetch_assoc()) {
                array_push($total, $row);
                }
                return $total;
            }
            function verificarCelularesCargueOpcionesNotNull($campo, $tabla){
                $campos = "COUNT(CHARACTER_LENGTH(`".$campo."`)) AS TOTAL";                
                $total = array();
                $condiciones = "WHERE ".$campo." != '' AND ".$campo." IS NOt NULL AND CHARACTER_LENGTH(`".$campo."`)<>10 OR telefono NOT LIKE '3%'";
                $result = $this->generica('select', $campos, $tabla, $condiciones);
                while ($row = $result->fetch_assoc()) {
                array_push($total, $row);
                }
                return $total;
            }
            function verificarDuplicados2Tablas($campo, $tabla1, $tabla2){
                $campos = "COUNT(".$campo.") AS TOTAL";
                $tabla = $tabla1;
                $duplicados = array();
                $condiciones = "(
                    SELECT ".$campo."
                    FROM ".$tabla1."
                    UNION ALL
                    SELECT ".$campo."
                    FROM ".$tabla2."
                )  t
                GROUP BY ".$campo."
                HAVING COUNT(*) > 1";
                $result = $this->generica('selectunion', $campos, $tabla, $condiciones);
                while ($row = $result->fetch_assoc()) {
                    array_push($duplicados, $row);
                }
                return $duplicados;
            }
            function verificarDuplicados2TablasConFiltro($campo, $tabla1, $tabla2, $campofiltro,$variable){
                $campos = "COUNT(".$campo.") AS TOTAL";
                $tabla = $tabla1;
                $duplicados = array();
                $condiciones = "(
                    SELECT ".$campo."
                    FROM ".$tabla1."
                    WHERE ".$campofiltro."=".$variable."
                    UNION ALL
                    SELECT ".$campo."
                    FROM ".$tabla2."
                    WHERE ".$campofiltro."=".$variable."
                )  t
                GROUP BY ".$campo."
                HAVING COUNT(*) > 1";
                $result = $this->generica('selectunion', $campos, $tabla, $condiciones);
                while ($row = $result->fetch_assoc()) {
                    array_push($duplicados, $row);
                }
                return $duplicados;
            }
            function comprobarCorreoElectronico($campo1, $tabla1){
                $campos = "COUNT(".$campo1.") AS total";
                $tabla = $tabla1;
                $duplicados = array();
                $condiciones = " WHERE `correo` NOT REGEXP '^[a-zA-Z0-9][a-zA-Z0-9.!#$%&*+-/=?^_`{|}~]*?[a-zA-Z0-9._-]?@[a-zA-Z0-9][a-zA-Z0-9._-]*?[a-zA-Z0-9]?\\.[a-zA-Z]{2,63}$' AND fk_id_pymes=".$_SESSION['id_pymes'].";"; 
                $result = $this->generica('select', $campos, $tabla, $condiciones);
                while ($row = $result->fetch_assoc()) {
                    array_push($duplicados, $row);
                }
                return $duplicados;
            }
            function verificarDuplicados2TablasConFiltroSumandoTotal($campo1, $campo2, $tabla1, $tabla2){
                $campos = "COUNT(t1.".$campo1.") AS TOTAL";
                $tabla = $tabla1;
                $duplicados = array();
                $condiciones = $tabla1." t1
                INNER JOIN ".$tabla2." tmp ON t1.".$campo1." = tmp.".$campo2." WHERE t1.fk_id_pymes=".$_SESSION['id_pymes'].";"; 
                $result = $this->generica('selectunion', $campos, $tabla, $condiciones);
                while ($row = $result->fetch_assoc()) {
                    array_push($duplicados, $row);
                }
                return $duplicados;
            }          
            function resetAutoincremental($tablaReset){                      
                $campos = "";
                $tabla = $tablaReset;        
                $condiciones = "AUTO_INCREMENT =1;";
                if ($this->generica('alter', $campos, $tabla, $condiciones)) {                    
                } else {
                    echo 0;
                }        
            }
            function borrarTemporal($tablaborrar){                      
                $campos = "";
                $tabla = "`".$tablaborrar."`";        
                $condiciones = "";
                if ($this->generica('truncate', $campos, $tabla, $condiciones)) {                
                } else {
                    echo 0;
                }        
            }
            function consultaridminmax($campoid, $tabla, $orden){                
                $campos = $campoid." AS ".$campoid;
                $tabla = $tabla;
                $idmin = array();
                $condiciones = "ORDER BY `".$campoid."` ".$orden." LIMIT 1;";
                $result = $this->generica('select', $campos, $tabla, $condiciones);
                while ($row = $result->fetch_assoc()) {
                    array_push($idmin, $row);
                }
                return $idmin;        
            }
            public function comprobarNulosEspaciosVacios($objsqlTabla){
                $arraycampos = explode(", ",$objsqlTabla->campos);
                $tamanoCampos=sizeof($arraycampos);
                for($i=0;$i<=$tamanoCampos-1;$i++){                  
                $campos = "COUNT(*) AS haynulos";
                $tabla = "".$objsqlTabla->tabla."";
                $nulos = array();
                $condiciones = "WHERE ".$arraycampos[$i]." IS NULL OR ".$arraycampos[$i]." = ' ' OR ".$arraycampos[$i]." = '';";
                $result = $this->generica('select', $campos, $tabla, $condiciones);
                while($row = $result->fetch_assoc()) {
                    array_push($nulos, $row); 
                }
                $contar[]=$nulos[0]['haynulos'];           
                }                
                $nulos=array_sum($contar);                               
                return $nulos;      
            }
        }
        class correos {
            function enviar($remitente, $destinatario, $asunto, $contenido, $noreply) {
                require '../vendor/autoload.php';
                //Estructura básica en HTML
                    $contenido = '
                        <html>
                            <head>
                                <title>Correo</title>
                                <meta charset="utf-8">
                                <style>
                                    @media (max-width: 992px) {
                                        #celda_a, #celda_c {
                                            width: 5.3% !important;
                                        }
                                        #celda_b {
                                            width: 89.4% !important;
                                        }
                                    }
                                </style>
                            </head>
                            <body style="background: #FBF0EA;font-family: Arial, Helvetica, sans-serif;margin: 0;">
                                <br>
                                <table style="width: 100%;">
                                    <tr>
                                        <td id="celda_a" style="width: 23.3%;"></td>
                                        <td id="celda_b" style="width: 33.3%;">
                                            <div style="background: #FFF;color: #1d1d1b;">
                                                '.$contenido.'
                                            </div>
                                        </td>
                                        <td id="celda_c" style="width: 23.3%;"></td>
                                    </tr>
                                </table>
                                <br><br>
                            </body>
                        </html>
                    ';
                //Enviar el correo por el SES de AWS
                    $sender = ($noreply == 0) ? 'letstalk@theflowarchitects.com' : 'letstalk@theflowarchitects.com'; //Reply/No-reply
                    $senderName = 'CEI Empresarial S.A.S';
                    $usernameSmtp = 'AKIASP2F5FSU7ROANUOF';
                    $passwordSmtp = 'BFcUvfp+xWMB7JYj1Xi7aSfuRIXeq0qt6K96YkYejqFp';
                    $host = 'email-smtp.us-east-1.amazonaws.com';
                    $port = 587;
                    $bodyText = '';
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->setFrom($sender, $senderName);
                        $mail->CharSet = 'UTF-8';
                        $mail->Username   = $usernameSmtp;
                        $mail->Password   = $passwordSmtp;
                        $mail->Host       = $host;
                        $mail->Port       = $port;
                        $mail->SMTPAuth   = true;
                        $mail->SMTPSecure = 'tls';
                        $mail->addAddress($destinatario);
                        $mail->isHTML(true);
                        $mail->Subject    = $asunto;
                        $mail->Body       = $contenido;
                        $mail->AltBody    = $bodyText;
                        $mail->Send();
                        //return "Email sent!" , PHP_EOL;
                        return 1;
                    } catch (phpmailerException $e) {
                        echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
                        //return 0;
                    } catch (Exception $e) {
                        echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
                        //return 0;
                    }
            }
        }
        class webservices {/*
            // Inicio de webservices usados para Increase
                function obtenerSuscripcionIncrease($id) {
                    $url = "https://gateway.increase.app/pay/public/v1/subscriptions/" . $id;

                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    $headers = array(
                        "Authorization: Bearer ZUxa8B97Qur1dByzkbWo8a7Zn7yfFLBzazbk1jsohwBVV2HlQjvLVejJ6pLCPW9p",
                    );
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                    //for debug only!
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $resp = curl_exec($curl);
                    curl_close($curl);

                    return json_decode($resp, true);
                }
                function obtenerPlanIncrease($id) { //Igual al método de obtenerSuscripcionIncrease
                    $url = "https://gateway.increase.app/pay/public/v1/plans/".$id;

                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    $headers = array(
                    "Authorization: Bearer ZUxa8B97Qur1dByzkbWo8a7Zn7yfFLBzazbk1jsohwBVV2HlQjvLVejJ6pLCPW9p",
                    );
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                    //for debug only!
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $resp = curl_exec($curl);
                    curl_close($curl);

                    return json_decode($resp, true);
                }
                function crearClienteIncrease($id) {
                    $url = "https://gateway.increase.app/pay/public/v1/customers";

                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

                    $headers = array(
                    "Authorization: Bearer ZUxa8B97Qur1dByzkbWo8a7Zn7yfFLBzazbk1jsohwBVV2HlQjvLVejJ6pLCPW9p",
                    "Content-Type: application/json",
                    );
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

                    $email = $_POST['data']['correo_colaborador'];
                    $tax_id = $_POST['data']['numero_documento'];
                    $razon_social = explode(' ', $_POST['data']['razon_social']);
                    $first_name = $razon_social[0];
                    $last_name = (isset($razon_social[1]) && $razon_social[1] != '' && $razon_social[1] != ' ') ? $razon_social[1] : '(sin apellido)';
                    $direccion = $_POST['data']['direccion'];
                    $telefono = $_POST['data']['telefono'];
                    $ciudad = $_POST['data']['ciudad'];
                    

                    $data = <<<DATA
                    {
                        "external_id": "$id",
                        "email": "$email",
                        "tax_id": "$tax_id",
                        "first_name": "$first_name",
                        "last_name": "$last_name",
                        "billing_info": {
                            "address_line_1": "$direccion",
                            "country": "COL",
                            "city": "$ciudad",
                            "zip_code": "110911",
                            "phone": "$telefono"
                    }
                    }
                    DATA;

                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                    //for debug only!
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                    $resp = curl_exec($curl);
                    curl_close($curl);

                    return json_decode($resp, true);
                }
                function crearSuscripcionIncrease($id) {
                    $url = "https://gateway.increase.app/pay/public/v1/subscriptions";

                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_POST, true);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
                    $headers = array(
                    "Authorization: Bearer ZUxa8B97Qur1dByzkbWo8a7Zn7yfFLBzazbk1jsohwBVV2HlQjvLVejJ6pLCPW9p",
                    "Content-Type: application/json",
                    );
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        
                    $plan_id = $_POST['data']['plan'];
                    $external_id = $_POST['data']['numero_documento_colaborador'];
        
                    $data = <<<DATA
                    {
                        "customer_id": "$id",
                        "plan_id": "$plan_id",
                        "external_id": "$external_id"
                    }
                    DATA;
        
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        
                    //for debug only!
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
                    $resp = curl_exec($curl);
                    curl_close($curl);
                    return json_decode($resp, true);
                }
            // Fin de webservices usados para Increase
    */}
?>