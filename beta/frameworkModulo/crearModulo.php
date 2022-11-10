<?php
        require "moduloTexto.php";
        class modulo
        {
            function __construct()
            {
                date_default_timezone_set("America/Bogota");
                $this->nombreProyecto="ceicol";
                $this->moduloTexto = new moduloTexto;
            }
            function crearCarpetasyArchivos($nombreModulo){
                if(mkdir("../" . $this->nombreProyecto . "/".$nombreModulo, 755)){
                if($frameworkModulo = fopen("../" . $this->nombreProyecto . "/" . $nombreModulo . "/index.php", "w+b")){
                $indexTexto = $this->moduloTexto->indexTexto($nombreModulo);
                fwrite($frameworkModulo, $indexTexto);
                fclose($frameworkModulo);        
                $total["archivosCreados"]=1;
                }
                else {echo "No se pudo crear el archivo del ".$nombreModulo." Index";}
                }
                else { echo "No se puedo crear la carpeta "."../" . $this->nombreProyecto . "/".$nombreModulo; 
                    }
                    $total["carpetaCreada"]=1;
                return $total;
            }
            function crearArchivoModelo($nombreModulo, $total){
                if($frameworkModelo = fopen("../modelo/" . $nombreModulo . ".php", "w+b")){ 
                    $modeloTexto = $this->moduloTexto->modeloTexto($nombreModulo);
                fwrite($frameworkModelo, $modeloTexto);
                fclose($frameworkModelo);        
                $total["archivosCreados"]=1+$total["archivosCreados"];       
                }
                else {echo "No se pudo crear el archivo modelo";}
                return $total;
            }
            function crearArchivoVista($nombreModulo, $total){
                if($frameworkModelo = fopen("../vista/" . $nombreModulo . ".php", "w+b")){ 
                    $vistaTexto = $this->moduloTexto->vistaTexto($nombreModulo);
                fwrite($frameworkModelo, $vistaTexto);
                fclose($frameworkModelo);        
                $total["archivosCreados"]=1+$total["archivosCreados"];       
                }
                else {echo "No se pudo crear el archivo vista";}
                return $total;
            }
            function crearArchivoJs($nombreModulo, $total){
                if($frameworkModelo = fopen("../js/" . $nombreModulo . ".js", "w+b")){ 
                    $jsTexto = $this->moduloTexto->jsTexto($this->nombreProyecto);
                fwrite($frameworkModelo, $jsTexto);
                fclose($frameworkModelo);        
                $total["archivosCreados"]=1+$total["archivosCreados"];       
                }
                else {echo "No se pudo crear el archivo vista";}
                return $total;
            }
        
        }
        $nuevoModulo = new modulo();
        $nombreModulo = "prueba";
        $total=$nuevoModulo->crearCarpetasyArchivos($nombreModulo);
        $total=$nuevoModulo->crearArchivoModelo($nombreModulo,$total);
        $total=$nuevoModulo->crearArchivoVista($nombreModulo,$total);
        $total=$nuevoModulo->crearArchivoJs($nombreModulo,$total);
        print_r($total);