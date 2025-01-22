<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['especie', 'peso', 'altura', 'fechaNacimiento', 'imagen'];

    // Metodo para calcular la edad del animal usando el paquete Carbon
    public function getEdad(){
        $fechaFormateada=Carbon::parse($this->fechaNacimiento);
        return $fechaFormateada->diffInYears(Carbon::now());
    }
}
