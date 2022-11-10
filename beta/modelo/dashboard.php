<?php
        //Este es un ejemplo debe ajustarlo a sus bases de datos.
        require "consultas.php";
        class dashboardModelo {
            function __construct() {
                $this->consulta = new consultas();                
            }
            //Consultas ejemplo
                function ejemplo_consulta() {
                    $campos = "*, cualquiera";
                    $tabla = "`ceicol`";
                    $condiciones = "WHERE `condiciones` = 1";
                    $array = $this->consulta->generica("select_alternativo", $campos, $tabla, $condiciones);                    
                    return $array;
                }
                function consulta_ejemplo() {
                    $campos = "descripcion";
                    $tabla = "ceicol";
                    $condiciones = "";
                    $array = $this->consulta->generica("select_alternativo", $campos, $tabla, $condiciones);                    
                    return $array;
                }
            }