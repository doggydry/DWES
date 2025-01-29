@extends('layouts.plantilla')
@section('titulo', 'Zoológico')
@section('contenido')
    <h1 class="text-4xl font-extrabold text-green-700 tracking-wide mb-8 text-center">
        Listado de Animales
    </h1>

    {{-- Contenedor principal con un diseño responsive y tarjetas estilizadas --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
        @foreach ($animales as $animal)
            {{-- Tarjeta individual --}}
            <div class="bg-white shadow-lg rounded-lg overflow-hidden transition-all transform hover:scale-105 hover:shadow-xl hover:ring-4 hover:ring-green-500">

                {{-- Imagen del animal sin hover --}}
                <div class="relative">
                    <img src="{{ asset('assets/imagenes/'.$animal->slug.'.jpg') }}"
                         alt="{{ $animal->especie }}"
                         class="w-full h-48 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-50"></div>
                </div>

                {{-- Contenido de la tarjeta --}}
                <div class="p-6 bg-gradient-to-br from-white to-green-50">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4 hover:text-green-600 transition-colors">
                        {{ $animal->especie }}
                    </h2>
                    <p class="text-gray-700 mb-4 text-sm italic">
                        {{ Str::limit($animal->descripcion, 100) }}
                    </p>
                    <a href="{{ route('animales.show', $animal) }}"
                       class="inline-block px-6 py-2 bg-green-600 text-white text-sm font-medium rounded-lg shadow hover:bg-green-700 transition-all focus:outline-none focus:ring-2 focus:ring-green-500">
                        Ver más detalles
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
