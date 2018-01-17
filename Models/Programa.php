<?php namespace Models;

    class Programa{

        //Atributos
        private $id;
        private $nombre;
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
            $sql = "SELECT * FROM programa ORDER BY id";
            $result = $this->con->query_return($sql);
            return $result;
        }

        public function view(){
            $sql = "SELECT * FROM programa WHERE id = $this->id";
            $result = $this->con->query_return($sql);
            return pg_fetch_assoc($result);            
        }

        public function add(){
            $sql = "INSERT INTO programa(nombre) VALUES ('$this->nombre')";            
            $this->con->query_simple($sql);
        }

        public function delete(){
            $sql = "DELETE FROM programa WHERE id = $this->id";
            $this->con->query_simple($sql);            
        }

        public function edit(){
            $sql = "UPDATE programa SET nombre = '$this->nombre' WHERE id = $this->id";
            $this->con->query_simple($sql);            
        }

    }
?>