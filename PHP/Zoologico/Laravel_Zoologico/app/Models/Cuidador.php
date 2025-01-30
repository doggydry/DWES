<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Asegúrate de importar esto

class Cuidador extends Model
{
    //Hay que utilizar el use Factory a parte de importar el namespace
    use HasFactory;
    protected $table = 'cuidadores';
    protected $fillable = ['nombre', 'slug', 'id_titulacion1', 'id_titulacion2'];

    public function animales(){
        return $this->belongsToMany(Animal::class);
    }

    public function titulacion1(){
        return $this->belongsTo(Titulacion::class,'id_titulacion1');
    }

    public function titulacion2(){
        return $this->belongsTo(Titulacion::class,'id_titulacion2');
    }

    //Metodo para sacar ambas titulaciones por cada cuidador
    public function titulaciones(){
        return $this->belongsTo(Titulacion::class, 'id_titulacion1')->get()
        ->merge($this->belongsTo(Titulacion::class, 'id_titulacion2')->get());
    }
}
