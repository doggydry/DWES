@extends('layouts.plantilla')

@section('titulo', 'Añadir Revisión')
@section('contenido')
    <div class="flex justify-center items-center min-h-screen bg-gray-50">
        <div class="bg-white shadow-lg rounded-lg p-8 border border-gray-300 max-w-4xl w-full">
            <h1 class="text-3xl font-semibold text-blue-700 text-center mb-6">
                Añadir Revisión para el {{ $animal->especie }}
            </h1>

            <form action="{{ route('revisiones.store', $animal->slug) }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="fecha" class="block text-gray-600 text-lg font-medium mb-2">Fecha de la Revisión</label>
                    <input type="date" id="fecha" name="fecha" value="{{ old('fecha') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                    @error('fecha')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="descripcion" class="block text-gray-600 text-lg font-medium mb-2">Descripción</label>
                    <textarea id="descripcion" name="descripcion" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <button type="submit"
                            class="inline-block px-6 py-3 bg-green-600 text-white text-lg font-semibold rounded-md shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Guardar Revisión
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
