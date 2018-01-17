<?php namespace Config;

    class Enrutador{

        public static function run(Request $request){
            $controlador = $request->get_controlador() . 'Controller';
            $ruta = ROOT . "Controllers" . DS . $controlador . ".php";
            $metodo = $request->get_metodo();
            $argumento = $request->get_argumento();

            if($metodo == "index.php"){
                $metodo = "index";
            }

            if(is_readable($ruta)){
                require_once $ruta;
                $mostrar = "Controllers\\" . $controlador;
                $controlador = new $mostrar;
                if(!isset($argumento)){
                    $datos = call_user_func(array($controlador,$metodo));
                }else{
                    $datos = call_user_func_array(array($controlador, $metodo),$argumento);
                }
            }

            //CARGA DE LA VISTA

            $ruta = ROOT . "Views" . DS . $request->get_controlador() . DS . $request->get_metodo() . ".php";
            if(is_readable($ruta)){
                require_once $ruta;
            }else{
                print "<h3>NO SE ENCUENTRA LA RUTA </h3>";
            }
        }
    }

?>