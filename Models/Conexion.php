<?php namespace Models;

    class Conexion{
        
        //Atributos
        private $data = array(
            "host" => "localhost",
            "port"=>"5432",
            "user" => "ubuntu",
            "pass" => "talentos",
            "db" => "Proyecto_Curso_Php_Poo" 
        );

        private $con;

        //Metodos
        private function get_con(){
            $host = $this->data['host'];
            $port = $this->data['port'];
            $dbname = $this->data['db'];
            $user = $this->data['user'];
            $pass = $this->data['pass'];
            
            $this->con = pg_connect("host = $host port=$port dbname=$dbname user=$user password=$pass") or die('No se ha podido conectar: ' . pg_last_error());
        }

        public function query_simple($sql_query){
            self::get_con();
            $result = pg_query($sql_query) or die('Query failed: ' . pg_last_error());
            pg_close($this->con);
        }

        public function query_return($sql_query){
            self::get_con();
            $result = pg_query($sql_query) or die('Query failed: ' . pg_last_error());
            pg_close($this->con);
            return $result;
        }

    }

    //Pruebas
    //$con = new Conexion();
    //$con->query_simple("DELETE FROM estudiante WHERE nombre = 'Estudiante 2'");
    //$con->query_simple("INSERT INTO estudiante(nombre,edad) VALUES ('Estudiante 2', 18)");
    //print_r($con->query_return("SELECT * FROM estudiante"));
?>