<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Asegúrate de importar esto

class Cuidador extends Model
{
    //Hay que utilizar el use Factory a parte de importar el namespace
    use HasFactory;
    protected $table = 'cuidadores';
    protected $fillable = ['name','slug'];

    public function animales(){
        return $this->belongsToMany(Animal::class);
    }
}
