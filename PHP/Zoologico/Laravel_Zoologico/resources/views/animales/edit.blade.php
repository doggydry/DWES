@extends('layouts.plantilla')
@section('titulo','Zoologico')
@section('contenido')
<h1 class="text-4xl font-extrabold text-green-600 tracking-wide mb-6">Pagina para editar a un {{$animal->especie}} </h1>
<h1 class="text-2xl font-extrabold text-blue-600 tracking-wide mb-6">Información sobre el {{ $animal->especie }}</h1>

<div class="flex flex-col items-center md:flex-row md:items-start space-y-6 md:space-y-0 md:space-x-8">
    <div class="w-full md:w-1/2">
        {{-- Información del animal --}}
        <ul class="text-left space-y-2">
            <li class="text-xl"><strong>Peso:</strong> {{ $animal->peso }}kg</li>
            <li class="text-xl"><strong>Altura:</strong> {{ $animal->altura }}cm</li>
            <li class="text-xl"><strong>Fecha de Nacimiento:</strong> {{ $animal->fechaNacimiento }}</li>
            <li class="text-xl"><strong>Alimentación:</strong> {{ $animal->alimentacion }}</li>
            <li class="text-xl"><strong>Descripción:</strong> {{ $animal->descripcion }}</li>
        </ul>
    </div>
    <div class="w-full md:w-1/2">
        {{-- Imagen del animal --}}
        <img src="{{ asset('assets/imagenes/'.$animal->slug.'.jpg') }}" alt="{{ $animal->especie }}" class="h-48 w-48 object-cover rounded-lg shadow-lg">
    </div>
</div>

{{-- Formulario para editar el animal --}}
<form action="{{ route('animales.update',$animal) }}" method="POST" enctype="multipart/form-data" class="mt-8 p-8 bg-gray-100 shadow-lg rounded-lg max-w-3xl mx-auto">
    @csrf
    @method('put')
    <h2 class="text-3xl font-semibold text-center text-green-700 mb-6">Editar {{ $animal->especie }}</h2>

    <div class="mb-4">
        <label for="especie" class="block text-lg font-semibold text-gray-700">Especie</label>
        <input type="text" name="especie" id="especie"  value="{{$animal->especie}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    <div class="mb-4">
        <label for="peso" class="block text-lg font-semibold text-gray-700">Peso (kg)</label>
        <input type="number" name="peso" id="peso"  value="{{$animal->peso}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    <div class="mb-4">
        <label for="altura" class="block text-lg font-semibold text-gray-700">Altura (cm)</label>
        <input type="number" name="altura" id="altura"  value="{{$animal->altura}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    <div class="mb-4">
        <label for="fechaNacimiento" class="block text-lg font-semibold text-gray-700">Fecha de Nacimiento</label>
        <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{$animal->fechaNacimiento}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    <div class="mb-4">
        <label for="imagen" class="block text-lg font-semibold text-gray-700">Imagen</label>
        <input type="file" name="imagen" id="imagen"  class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" accept="image/*">
    </div>

    <div class="mb-4">
        <label for="alimentacion" class="block text-lg font-semibold text-gray-700">Alimentación</label>
        <input type="text" name="alimentacion" id="alimentacion" value="{{$animal->alimentacion}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    <div class="mb-4">
        <label for="descripcion" class="block text-lg font-semibold text-gray-700">Descripción</label>
        <textarea name="descripcion" id="descripcion" rows="4" value="{{$animal->descripcion}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
    </div>

    <div class="mb-4 text-center">
        <button type="submit" class="w-full py-3 bg-green-600 text-white text-lg font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Actualizar Animal</button>
    </div>
</form>

@endsection
