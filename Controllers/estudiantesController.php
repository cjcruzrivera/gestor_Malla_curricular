<?php namespace Controllers;

    use Models\Estudiante as Estudiante;
    use Models\Programa as Programa;

    class estudiantesController{
        
        private $estudiante;
        private $programa;

        public function __construct(){
            $this->estudiante = new Estudiante();
            $this->programa = new Programa();
        }

        public function index(){
            $datos = $this->estudiante->listar();
            return $datos;
        }

        public function agregar(){

            if(!$_POST){
                $datos = $this->programa->listar();
                return $datos;
            }else{
                $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
                $limite_tamaño = 700*1024;
                
                if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_tamaño){
                    $nombre_imagen = $_FILES['imagen']['name'];
                    $ruta = "Views" . DS . "template" . DS . "imagenes" . DS . $nombre_imagen;
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);   
                }else{
                    $nombre_imagen = "standar.jpg";
                }

                $this->estudiante->set("nombre", $_POST['nombre']);
                $this->estudiante->set("edad", $_POST['edad']);
                $this->estudiante->set("promedio", $_POST['promedio']);
                $this->estudiante->set("id_programa", $_POST['id_programa']);
                $this->estudiante->set("imagen", $nombre_imagen);
                $this->estudiante->add();
                
                header("Location: " . URL . "estudiantes");
            }
        }

        public function editar($id){
            $this->estudiante->set("id",$id);            
            if(!$_POST){
                $datos = $this->estudiante->view();
                return $datos;
            }else{
                $permitidos = array("image/jpg","image/jpeg","image/png","image/gif");
                $limite_tamaño = 700*1024;
                
                if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_tamaño){
                    $nombre_imagen = $_FILES['imagen']['name'];
                    $ruta = "Views" . DS . "template" . DS . "imagenes" . DS . $nombre_imagen;
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta);
                }else{
                    $nombre_imagen = $_POST['imagen_old'];
                }

                $this->estudiante->set("nombre", $_POST['nombre']);
                $this->estudiante->set("edad", $_POST['edad']);
                $this->estudiante->set("promedio", $_POST['promedio']);
                $this->estudiante->set("id_programa", $_POST['id_programa']);
                $this->estudiante->set("imagen", $nombre_imagen);   
                
                $this->estudiante->edit();
                header("Location: " . URL . "estudiantes");
                
            }
        }

        public function listar_programas(){
            $datos = $this->programa->listar();
            return $datos;
        }

        public function ver($id){
            $this->estudiante->set("id",$id);
            $datos = $this->estudiante->view();
            return $datos;
        }

        public function eliminar($id){
            $this->estudiante->set("id",$id);
            $datos = $this->estudiante->delete();
            header("Location: " . URL . "estudiantes");
            
        }


    }

    $estudiantes = new estudiantesController();
?>