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
                    } elseif($tipo == 'selectsencillo') {
                        $sql = "SELECT ".$condiciones;
                        $result = $conn->query($sql);
                        $array = array();
                        while ($row = $result->fetch_assoc()) {
                            array_push($array, $row);
                        }
                        return $array;
                    }
                     elseif($tipo == 'insert') {
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
                    $condiciones = " WHERE `correo` NOT REGEXP '^[a-zA-Z0-9][a-zA-Z0-9.!#$%&*+-/=?^_`{|}~]*?[a-zA-Z0-9._-]?@[a-zA-Z0-9][a-zA-Z0-9._-]*?[a-zA-Z0-9]?\.[a-zA-Z]{2,63}$' AND fk_id_pymes=".$_SESSION['id_pymes'].";"; 
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