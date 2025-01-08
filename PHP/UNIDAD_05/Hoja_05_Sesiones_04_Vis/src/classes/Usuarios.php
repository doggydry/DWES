<?php
namespace Vis\classes;

class Usuarios{

    private int $id;
    private string $correo;

    public function __construct(int $id, string $correo,string $clave){
        $this->id = $id;
        $this->correo = $correo;
    }
    public function getId(){
        return $this->id;
    }
    public function getCorreo(){
        return $this->correo;
    }

}