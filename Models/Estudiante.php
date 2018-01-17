<?php namespace Models;

    class Estudiante{
        
        //Atributos
        private $id;
        private $nombre;
        private $edad;
        private $promedio;
        private $imagen;
        private $id_programa;
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
            $sql = "SELECT est.*, secc.nombre as nombre_programa
                    FROM estudiante est INNER JOIN programa secc ON est.id_programa =  secc.id";
            
            $result = $this->con->query_return($sql);
            return $result;
        }

        public function view(){
            $sql = "SELECT est.*, secc.nombre as nombre_programa
                    FROM estudiante est INNER JOIN programa secc ON est.id_programa =  secc.id
                    WHERE est.id = $this->id";
            $result = $this->con->query_return($sql);
            return pg_fetch_assoc($result);            
        }

        public function add(){
            $sql = "INSERT INTO estudiante(nombre, edad, promedio, imagen, id_programa)
                    VALUES ('$this->nombre', $this->edad, $this->promedio, '$this->imagen', $this->id_programa)";
            
            $this->con->query_simple($sql);
        }

        public function delete(){
            $sql = "DELETE FROM estudiante WHERE id = $this->id";
            $this->con->query_simple($sql);            
        }

        public function edit(){
            $sql = "UPDATE estudiante
                    SET nombre = '$this->nombre', edad = $this->edad,imagen = '$this->imagen', promedio = $this->promedio, id_programa = $this->id_programa
                    WHERE id = $this->id";
            $this->con->query_simple($sql);            
        }
    }

    // Pruebas
    //$est = new Estudiante();
    //$est->set('nombre','prueba');
    //$est->add();
?>