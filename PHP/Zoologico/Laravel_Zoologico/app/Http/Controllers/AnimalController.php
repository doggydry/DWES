<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return '<h1>Listado de animales:</h1>
        <ul>
            <li>Monos</li>
            <li>Higuanas</li>
            <li>Zebras</li>
            </li>
        </ul>';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return '<h1>Pagina para crear un animal</h1>';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $animal)
    {
        return '<h1>Informacion en detalle de ' . $animal . '</h1>';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $animalModificar)
    {
        return '<h1>Pagina para modificar a ' . $animalModificar . '</h1>';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
