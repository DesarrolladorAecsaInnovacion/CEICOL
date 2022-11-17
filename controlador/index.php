 <?php
        require __DIR__ ."/../modelo/index.php";
        //require __DIR__ ."/../vista/index.php";
        class controlador {
            function consultar() {
                if(isset($_POST["clase"]) && class_exists($_POST["clase"]) && isset($_POST["metodo"])) {
                    $clase = new $_POST["clase"]();
                    $metodo = $_POST["metodo"];
                    $clase->$metodo();
                }
            }
        }
        $controlador = new controlador();
        $controlador->consultar();
        ?>