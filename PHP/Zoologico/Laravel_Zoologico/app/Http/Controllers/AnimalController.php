<?php


namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Requests\CrearAnimalRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Animal;
use Illuminate\Support\Facades\Redirect;


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
        return view('animales.index', data: ['animales' => $animales]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
        //Pasamos la variable a la vista
        return view('animales.show', compact('animal'));
    }



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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {

        //Pasamos la variable a la vista
        return view('animales.edit', compact('animal'));
    }



    /*
        //Verificamos si el indice del animal existe, si no existe devolvemos un 404
        if (!isset($this->animales[$animal])) {
            abort(404, 'Animal no encontrado');
        }
        //Accedemos al animal seleccionado y le pasamos a la vista ese dato
        $animal = $this->animales[$animal];
        return view('animales.edit', ['animal' => $animal]);
        */



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('animales.create');
    }
    //AQUI
    /**
     * Le pasamos a la funcion la clase Request como parámetro a través de la inyección de dependencias.
     */
    public function update(CrearAnimalRequest $request, Animal $animal)
    {
        // Validamos los datos del request
        $request->validated();

        // Actualizamos los campos básicos
        $animal->especie = $request->input('especie');
        $animal->peso = $request->input('peso');
        $animal->altura = $request->input('altura');
        $animal->fechaNacimiento = $request->input('fechaNacimiento');
        $animal->alimentacion = $request->input('alimentacion');

        $animal->descripcion = $request->input('descripcion');

        // Verificamos si la especie ha cambiado para actualizar el slug
        if (Str::slug($animal->especie) !== Str::slug($request->input('especie'))) {
            $animal->slug = Str::slug($request->input('especie'));
        }


        // Verificamos si se ha subido una nueva imagen
        if ($request->hasFile('imagen')) {
            //*IMPORTANTE GUARDAR EL SLUG AL GUARDAR EL ARCHIVO
            $animal->slug = Str::slug($request->input('especie')); // Actualiza el slug
            $filename = Str::slug($request->input('especie')) . '.' . $request->file('imagen')->getClientOriginalExtension();

            // Guardamos la nueva imagen
            $request->file('imagen')->storeAs('', $filename, 'animales');

            // Actualizamos la ruta de la imagen
            $animal->imagen = $filename;
        }

        // Guardamos los cambios en la base de datos
        $animal->save();

        // Redirigimos a la vista de detalles del animal actualizado
        return redirect()->route('animales.show', $animal->slug)->with('success', 'Animal actualizado correctamente');
    }

    /**
     * Le pasamos a la funcion la clase Request como parametro.
     */
    public function store(CrearAnimalRequest $request)
    {
        $request->validated();
        // Creamos la instancia del nuevo animal
        $animal = new Animal();
        $animal->fill($request->all());

        // Asignamos los campos validados a cada atributo
        $animal->especie = $request->input('especie');
        $animal->peso = $request->input('peso');
        $animal->altura = $request->input('altura');
        $animal->fechaNacimiento = $request->input('fechaNacimiento');
        $animal->descripcion = $request->input('descripcion');


        $filename = Str::slug($request->input('especie')) . '.' . $request->file('imagen')->getClientOriginalExtension();
        //Generar el nombre del arhchivo basado en al especie
        $request->file('imagen')->storeAs('', $filename, 'animales');

        // Creamos el slug a partir de la especie
        $animal->slug = Str::slug($animal->especie);

        //Guardar la ruta relativa en el modelo
        $animal->imagen = $filename;


        // Guardamos el modelo en la base de datos
        $animal->save();

        // Redirigimos a la vista de detalles del animal creado
        return redirect()->route('animales.show', $animal->slug)->with('success', 'Animal guardado correctamente');
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
