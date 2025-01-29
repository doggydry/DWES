<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['especie', 'slug', 'peso', 'altura','fechaNacimiento','imagen','alimentacion', 'descripcion'];

    // Metodo para calcular la edad del animal usando el paquete Carbon
    public function getEdad(){
        $fechaFormateada=Carbon::parse($this->fechaNacimiento);
        return $fechaFormateada->diffInYears(Carbon::now());
    }

    public function getRouteKeyName(){
        return 'slug';
    }

    public function revisiones(){
        return $this->hasMany(Revision::class);
    }

    public function cuidadores(){
        return $this->belongsToMany(Cuidador::class);
    }

}
