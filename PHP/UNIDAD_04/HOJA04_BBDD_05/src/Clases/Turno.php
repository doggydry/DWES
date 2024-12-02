<?php

namespace Hospital\Clases;

class Turno
{
    private int $id;
    private string $descripcion;
    private string $horario;

    public function __construct($id, $descripcion, $horario)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->horario = $horario;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getHorario()
    {
        return $this->horario;
    }
    public function getId()
    {
        return $this->id;
    }


    public function setHorario(string $nuevoHorario): string
    {
        if ($nuevoHorario === $this->horario) {
            return 'El horario no puede ser igual que el anterior';
        } else {
            $this->horario === $nuevoHorario;
            return 'Horario actualizado';
        }
    }

    public function __tostring()
    {
        return  $this->getDescripcion() .' - '. $this->getHorario();
    }
}
