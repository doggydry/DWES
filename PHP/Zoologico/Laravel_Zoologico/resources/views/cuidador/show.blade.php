@extends('layouts.plantilla')

@section('titulo', 'Cuidador - ' . $cuidador->name)

@section('contenido')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200 max-w-6xl w-full">
            {{-- Título principal --}}
            <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">
                Detalles del Cuidador: {{ $cuidador->name }}
            </h1>

            {{-- Información del cuidador --}}
            <div class="space-y-6">
                {{-- Sección de titulaciones --}}
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">
                        Titulaciones
                    </h2>
                    <ul class="space-y-2 text-gray-700">
                        {{-- Acceder a cada titulacion directamente desde la colección --}}
                        @foreach ($cuidador->titulaciones as $titulacion)
                            <li>{{ $titulacion->nombre }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
