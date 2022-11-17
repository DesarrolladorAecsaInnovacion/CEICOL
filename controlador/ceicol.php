<?php
        class controlador {
            function consultar() {
                if(isset($_POST["clase"]) && isset($_POST["tipo"]) && isset($_POST["metodo"])) {
                    if ($_POST["tipo"] == "modelo") {
                        require __DIR__ ."/../modelo/".$_POST["clase"].".php";
                        $clase = $_POST["clase"]."Modelo";
                        $clase = new $clase();
                    } else {
                        require __DIR__ ."/../vista/".$_POST["clase"].".php";
                        $clase = new $_POST["clase"]();
                    }
                    $metodo = $_POST["metodo"];
                    $clase->$metodo();
                }
            }
        }
        $controlador = new controlador();
        $controlador->consultar();
        ?>