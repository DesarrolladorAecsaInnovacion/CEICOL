<?php
        //Conexión
            class conexion {
                function conexion() {             
                    $servername = "gestionpymes2.cjjvbjxmws6i.us-east-1.rds.amazonaws.com";
                    $username = "admin";
                    $password = "gDtntpLY8q";
                    if ($_SERVER["SERVER_NAME"] == "ceicol.com") {
                        $dbname = "ceicol";              
                    } else {
                        $dbname = "ceicol";                    
                    }
                    $conn = new mysqli($servername, $username, $password, $dbname);                       
                    return $conn;
                }
            }
    ?>