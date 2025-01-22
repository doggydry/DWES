@extends('layouts.plantilla')
@section('titulo', 'Zoologico')
@section('contenido')
    <h1 class="text-4xl font-extrabold text-green-700 tracking-wide mb-8 text-center">Listado de Animales</h1>

    {{-- Contenedor principal --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @foreach ($animales as $animal)
            {{-- Tarjeta individual --}}
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-transform transform hover:scale-105">
                {{-- Imagen del animal --}}
                <img src="{{ asset('assets/imagenes/'.$animal->slug.'.jpg') }}"
                     alt="{{ $animal->especie }}"
                     class="w-full h-48 object-cover">

                {{-- Contenido de la tarjeta --}}
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                        {{ $animal->especie }}
                    </h2>
                    <a href="{{ route('animales.show', $animal) }}"
                       class="inline-block px-4 py-2 bg-green-600 text-white text-sm font-medium rounded-md hover:bg-green-700 transition-all focus:outline-none focus:ring-2 focus:ring-green-500">
                        Ver más detalles
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
