@extends('layouts.plantilla')
@section('titulo', 'Zoologico')
@section('contenido')
<div class="flex justify-center items-center min-h-screen bg-gray-100" >
    <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200 max-w-4xl w-full">
        {{-- Título --}}
        <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">
            Información sobre el {{ $animal->especie }}
        </h1>

        <div class="flex flex-col-reverse md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
            {{-- Sección de información --}}
            <div class="w-full md:w-1/2">
                <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">
                    Detalles del Animal
                </h2>
                <ul class="space-y-4 text-gray-700">
                    <li><strong>Peso:</strong> {{ $animal->peso }}kg</li>
                    <li><strong>Altura:</strong> {{ $animal->altura }}cm</li>
                    <li><strong>Fecha de Nacimiento:</strong> {{ $animal->fechaNacimiento }}</li>
                    <li><strong>Edad:</strong> {{ round($animal->getEdad()) }} años</li>
                    <li><strong>Alimentación:</strong> {{ $animal->alimentacion }}</li>
                    <li><strong>Descripción:</strong> {{ $animal->descripcion }}</li>
                </ul>
            </div>

            {{-- Sección de imagen y botón --}}
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <img src="{{ asset('assets/imagenes/'.$animal->slug.'.jpg') }}"
                     alt="{{ $animal->especie }}"
                     class="h-72 w-72 object-cover rounded-lg shadow-md border border-gray-300">

                <a href="{{ route('animales.edit', $animal) }}"
                   class="mt-4 inline-block px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Editar Información
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
