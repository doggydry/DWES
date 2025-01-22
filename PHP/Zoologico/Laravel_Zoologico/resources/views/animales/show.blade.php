@extends('layouts.plantilla')
@section('titulo','Zoologico')
@section('contenido')
<h1 class="text-2xl font-extrabold text-blue-600 tracking-wide mb-6">Información sobre el {{ $animal->especie }}</h1>

{{-- Contenedor principal con imagen e información --}}
<div class="flex flex-col-reverse md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
    <div class="w-full md:w-1/2">
        {{-- Información del animal --}}
        <ul class="text-left space-y-4">
            <li class="text-xl"><strong>Peso:</strong> {{ $animal->peso }}kg</li>
            <li class="text-xl"><strong>Altura:</strong> {{ $animal->altura }}cm</li>
            <li class="text-xl"><strong>Fecha de Nacimiento:</strong> {{ $animal->fechaNacimiento }}</li>
            <li class="text-xl"><strong>Edad:</strong> {{ round($animal->getEdad()) }} años</li>
            <li class="text-xl"><strong>Alimentación:</strong> {{ $animal->alimentacion }}</li>
            <li class="text-xl"><strong>Descripción:</strong> {{ $animal->descripcion }}</li>
        </ul>
    </div>
    <div class="w-full md:w-1/2 flex flex-col items-center">
        {{-- Imagen del animal --}}
        <img src="{{ asset('assets/imagenes/'.$animal->slug.'.jpg') }}"
             alt="{{ $animal->especie }}"
             class="h-72 w-72 object-cover rounded-lg shadow-lg">

        {{-- Botón de Editar --}}
        <a href="{{ route('animales.edit', $animal) }}"
           class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Editar Información
        </a>
    </div>
</div>
@endsection
