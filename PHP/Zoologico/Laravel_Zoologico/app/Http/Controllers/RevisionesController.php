<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearRevisionRequest;
use App\Models\Animal;
use App\Models\Revision;
use Illuminate\Http\Request;

class RevisionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Animal $animal)
    {
        return view('revisiones.createRevision', compact('animal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearRevisionRequest $request, Animal $animal)
    {
        $request->validated();

        // Crear la revisión asociada al animal
        $revision = new Revision();
        $revision->fill($request->all());
        $revision->animal_id = $animal->id; // Asociamos la revisión al animal correcto
        $revision->save();

        return redirect()->route('animales.show', $animal->slug)->with('success', 'Revisión guardada correctamente');
    }


    /**
     * Display the specified resource.
     */
    public function show(Revision $revision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Revision $revision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Revision $revision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Revision $revision)
    {
        //
    }
}
