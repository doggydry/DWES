<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Revision extends Model
{
    protected $fillable = ['animal_id', 'fecha', 'descripcion'];

    /**
     * ¿Qué es el método animal()?
     *  El método animal() en el modelo Revision define una relación "muchos a uno" (Many-to-One) entre revisiones y animales.
     *  Esto significa que cada revisión pertenece a un único animal.
     * ¿Por qué usamos belongsTo()?
     *  En Laravel, belongsTo() se utiliza para definir este tipo de relaciones.
     *  Le indicamos al modelo Revision que tiene una columna animal_id que referencia el modelo Animal.
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
