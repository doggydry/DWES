<?php

namespace Database\Seeders;

use App\Models\Revision;
use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevisionesSeeder extends Seeder
{

    //Creamos dos revisiones

    protected $revisiones = array(
        array(
            'fecha'=>'2023/08/23',
            'descripcion'=>'Revision de posibles enfermedades',
        ),
        array(
            'fecha'=>'2020/03/12',
            'descripcion'=>'Revision de limpieza de dientes',
        )

    );
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animal = Animal::first();

        foreach ($this->revisiones as $revision){
            $r = new Revision();
            $r->animal_id = $animal->id;
            $r->fecha = $revision['fecha'];
            $r->descripcion = $revision['descripcion'];
            $r->save();
        }
        $this->command->info('Tabla revisiones insertada con exito');
    }
}
