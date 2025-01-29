@extends('layouts.plantilla')
@section('titulo', 'Zoológico')
@section('contenido')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-200 max-w-6xl w-full">
            {{-- Título principal --}}
            <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">
                Información sobre el {{ $animal->especie }}
            </h1>

            {{-- Contenedor principal dividido en dos secciones (horizontal) --}}
            <div class="flex flex-col md:flex-row items-start md:items-center space-y-6 md:space-y-0 md:space-x-8">

                {{-- Sección de información detallada del animal --}}
                <div class="w-full md:w-1/2 space-y-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">
                        Detalles del Animal
                    </h2>
                    <ul class="space-y-2 text-gray-700">
                        <li><strong>Peso:</strong> {{ $animal->peso }} kg</li>
                        <li><strong>Altura:</strong> {{ $animal->altura }} cm</li>
                        <li><strong>Fecha de Nacimiento:</strong> {{ $animal->fechaNacimiento }}</li>
                        <li><strong>Edad:</strong> {{ round($animal->getEdad()) }} años</li>
                        <li><strong>Alimentación:</strong> {{ $animal->alimentacion }}</li>
                        <li><strong>Descripción:</strong> {{ $animal->descripcion }}</li>
                    </ul>


                    {{-- Sección de revisiones asociadas al animal --}}
                    <h2 class="text-xl font-semibold text-gray-800 mt-6 border-b pb-2">
                        Revisiones
                    </h2>

                    <div class="space-y-4">
                        @forelse ($animal->revisiones as $revision)
                            {{-- Tarjeta individual de revisión --}}
                            <div class="bg-gray-100 p-4 rounded-lg shadow-md border-l-4 border-blue-500">
                                <p class="text-sm text-gray-600">
                                    <strong>Fecha:</strong> {{ $revision->fecha }}
                                </p>
                                <p class="text-gray-800">
                                    <strong>Descripción:</strong> {{ $revision->descripcion }}
                                </p>
                            </div>
                        @empty
                            <p class="text-gray-500 italic">El {{ $animal->especie }} no tiene revisiones registradas.</p>
                        @endforelse
                    </div>
                    {{-- Sección de Cuidadores --}}
                    <h2 class="text-xl font-semibold text-gray-800 mt-6 border-b pb-2">
                        Cuidadores Asignados
                    </h2>
                    <ul class="space-y-2 text-gray-700">
                        @forelse ($animal->cuidadores as $cuidador)
                            <li><strong>Nombre:</strong> {{ $cuidador->name }}</li>
                        @empty
                            <p class="text-gray-500 italic">Este animal no tiene cuidadores asignados.</p>
                        @endforelse
                    </ul>


                    {{-- Botón para añadir una nueva revisión --}}
                    <div class="flex space-x-4 mt-6">
                        <a href="{{ route('revisiones.createRevision', $animal->slug) }}"
                            class="inline-block px-6 py-3 bg-green-600 text-white text-lg font-semibold rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Añadir Revisión
                        </a>
                        {{-- Botón para editar la información del animal --}}
                        <a href="{{ route('animales.edit', $animal) }}"
                            class="inline-block px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Editar Información
                        </a>
                    </div>
                </div>

                {{-- Sección de imagen --}}
                <div class="w-full md:w-1/2 flex flex-col items-center">
                    {{-- Imagen del animal --}}
                    <img src="{{ asset('assets/imagenes/' . $animal->slug . '.jpg') }}" alt="{{ $animal->especie }}"
                        class="h-72 w-72 object-cover rounded-lg shadow-md border border-gray-300">
                </div>
            </div>
        </div>
    </div>
@endsection
