<?php namespace Models;

    class Estudiante{
        
        //Atributos
        private $id;
        private $nombre;
        private $edad;
        private $promedio;
        private $imagen;
        private $id_seccion;
        private $con;

        //Metodos
        public function __construct(){
            $this->con = new Conexion();
        }
        
        public function set($atr, $valor){
            $this->$atr = $valor;
        }

        public function get($atr){
            return $this->$atr;
        }

        public function listar(){
            $sql = "SELECT est.*, secc.nombre as nombre_seccion
                    FROM estudiante est INNER JOIN seccion secc ON est.id_seccion =  secc.id";
            
            $result = $this->con->query_return($sql);
            return $result;
        }

        public function view(){
            $sql = "SELECT est.*, secc.nombre as nombre_seccion
                    FROM estudiante est INNER JOIN seccion secc ON est.id_seccion =  secc.id
                    WHERE est.id = $this->id";
            $result = $this->con->query_return($sql);
            return pg_fetch_assoc($result);            
        }

        public function add(){
            $sql = "INSERT INTO estudiante(nombre, edad, promedio, imagen, id_seccion)
                    VALUES ('$this->nombre', $this->edad, $this->promedio, '$this->imagen', $this->id_seccion)";
            
            $this->con->query_simple($sql);
        }

        public function delete(){
            $sql = "DELETE FROM estudiante WHERE id = $this->id";
            $this->con->query_simple($sql);            
        }

        public function edit(){
            $sql = "UPDATE estudiante
                    SET nombre = '$this->nombre', edad = $this->edad,imagen = '$this->imagen', promedio = $this->promedio, id_seccion = $this->id_seccion
                    WHERE id = $this->id";
            $this->con->query_simple($sql);            
        }
    }

    // Pruebas
    //$est = new Estudiante();
    //$est->set('nombre','prueba');
    //$est->add();
?>