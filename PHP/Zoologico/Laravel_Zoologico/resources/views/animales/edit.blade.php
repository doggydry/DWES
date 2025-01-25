@extends('layouts.plantilla')
@section('titulo', 'Zoologico')
@section('contenido')
    <div class="flex flex-col md:flex-row md:space-x-8 space-y-8 md:space-y-0">
        {{-- Información del animal --}}
        <div class="w-full md:w-1/2 bg-gray-100 p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Información del {{ $animal->especie }}</h2>
            <ul class="text-left space-y-3">
                <li class="text-lg"><strong>Peso:</strong> {{ $animal->peso }} kg</li>
                <li class="text-lg"><strong>Altura:</strong> {{ $animal->altura }} cm</li>
                <li class="text-lg"><strong>Fecha de Nacimiento:</strong> {{ $animal->fechaNacimiento }}</li>
                <li class="text-lg"><strong>Alimentación:</strong> {{ $animal->alimentacion }}</li>
                <li class="text-lg"><strong>Descripción:</strong> {{ $animal->descripcion }}</li>
            </ul>
            <div class="mt-6">
                <img src="{{ asset('assets/imagenes/' . $animal->slug . '.jpg') }}" alt="{{ $animal->especie }}"
                    class="h-48 w-48 object-cover rounded-lg shadow-lg mx-auto">
            </div>
        </div>

        {{-- Formulario para editar el animal --}}
        <form action="{{ route('animales.update', $animal) }}" method="POST" enctype="multipart/form-data"
            class="w-full md:w-1/2 bg-white p-6 rounded-lg shadow-lg">
            @csrf
            @method('put')
            <h2 class="text-3xl font-semibold text-green-700 mb-6 text-center">Editar {{ $animal->especie }}</h2>

            <div class="mb-4">
                <label for="especie" class="block text-lg font-semibold text-gray-700">Especie</label>
                <input type="text" name="especie" id="especie" value="{{ $animal->especie }}"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('especie')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="peso" class="block text-lg font-semibold text-gray-700">Peso (kg)</label>
                <input type="number" name="peso" id="peso" value="{{ $animal->peso }}"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('peso')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="altura" class="block text-lg font-semibold text-gray-700">Altura (cm)</label>
                <input type="number" name="altura" id="altura" value="{{ $animal->altura }}"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('altura')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="fechaNacimiento" class="block text-lg font-semibold text-gray-700">Fecha de Nacimiento</label>
                <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{ $animal->fechaNacimiento }}"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('fechaNacimiento')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="imagen" class="block text-lg font-semibold text-gray-700">Imagen</label>
                <input type="file" name="imagen" id="imagen"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    accept="image/*">
                @error('imagen')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="alimentacion" class="block text-lg font-semibold text-gray-700">Alimentación</label>
                <input type="text" name="alimentacion" id="alimentacion" value="{{ $animal->alimentacion }}"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
                @error('alimentacion')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-lg font-semibold text-gray-700">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">{{ $animal->descripcion }}</textarea>
                @error('descripcion')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4 text-center">
                <button type="submit"
                    class="w-full py-3 bg-green-600 text-white text-lg font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Actualizar
                    Animal</button>
            </div>

        </form>
    </div>
@endsection
