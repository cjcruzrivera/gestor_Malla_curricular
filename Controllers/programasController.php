<?php namespace Controllers;

use Models\Programa as Programa;

class programasController
{

    private $programa;

    public function __construct()
    {
        $this->programa = new Programa();
    }

    public function index()
    {
        $datos = $this->programa->listar();
        return $datos;
    }

    public function agregar()
    {
        if (!$_POST) {
            
        } else {
            $this->programa->set("nombre", $_POST['nombre']);
            $this->programa->add();
            header("Location: " . URL . "programas");
        }
    }

    public function editar($id){
        $this->programa->set("id",$id);
        if(!$_POST){
            $datos = $this->programa->view();
            return $datos;
        }else{
            $this->programa->set("nombre", $_POST['nombre']);
            $this->programa->edit();
            header("Location: " . URL . "programas");            
        }
    }

    public function eliminar($id){
        $this->programa->set("id",$id);
        $datos = $this->programa->delete();
        header("Location: " . URL . "programas");
        
    }
}
