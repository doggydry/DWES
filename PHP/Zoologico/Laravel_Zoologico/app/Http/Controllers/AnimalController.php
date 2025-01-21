<?php


namespace App\Http\Controllers;

use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Http\Request;
use App\Models\Animal;
class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Obtenemos los registros de la tabla usando el metodo de Eloquent :all();
        $animales = Animal::all();

        //Pasamos los datos a la vista
        return view('animales.index', ['animales' => $animales]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //Pasamos la variable a la vista
        return view ('animales.show',compact('animal'));




        /*
        //Verificamos si el indice del animal existe, si no existe devolvemos un 404
        if (!isset($this->animales[$animal])) {
            abort(404, 'Animal no encontrado');
        }
        //Accedemos al animal seleccionado y le pasamos a la vista ese dato
        //Es importante pasar la variable a la vista con el mismo nombre que la clave ( ['animal'=>$animal] )
        $animal = $this->animales[$animal];
        return view('animales.show', ['animal' => $animal]);
        */
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
       //Pasamos la variable a la vista
       return view ('animales.edit',compact('animal'));




        /*
        //Verificamos si el indice del animal existe, si no existe devolvemos un 404
        if (!isset($this->animales[$animal])) {
            abort(404, 'Animal no encontrado');
        }
        //Accedemos al animal seleccionado y le pasamos a la vista ese dato
        $animal = $this->animales[$animal];
        return view('animales.edit', ['animal' => $animal]);
        */
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animales.create');
    }






    /**
     * Le pasamos a la funcion la clase Request como parametro.
     */
    public function store(CrearAnimalRequest $request)
    {
         $a = new Animal();
    }


    /**
     * Le pasamos a la funcion la clase Request como parámetro a través de la inyección de dependencias.
     */
    public function update(CrearAnimalRequest $request, string $id)
    {

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
