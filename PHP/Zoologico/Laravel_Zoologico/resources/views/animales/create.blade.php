@extends('layouts.plantilla')
@section('titulo','Zoologico')
@section('contenido')
<h1 class="text-4xl font-extrabold text-green-600 tracking-wide mb-6">Crear un animal</h1>


{{--Formulario para crear un nuevo animal con todos sus campos
@csrf para evitar ataques Cross-Site Request Forgery
--}}
<form action="{{ route('animales.store') }}" method="POST" enctype="multipart/form-data" class="mt-8 p-8 bg-gray-100 shadow-lg rounded-lg max-w-3xl mx-auto">
    @csrf
    <h2 class="text-3xl font-semibold text-center text-green-700 mb-6">Crear un nuevo animal</h2>


    <div class="mb-4">
        <label for="especie" class="block text-lg font-semibold text-gray-700">Especie</label>
        <input type="text" name="especie" id="especie" value="{{old('especie')}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('especie')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>


    <div class="mb-4">
        <label for="peso" class="block text-lg font-semibold text-gray-700">Peso (kg)</label>
        <input type="number" name="peso" id="peso" value="{{old('peso')}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" >
        @error('peso')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>


    <div class="mb-4">
        <label for="altura" class="block text-lg font-semibold text-gray-700">Altura (cm)</label>
        <input type="number" name="altura" id="altura" value="{{old('altura')}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" >
        @error('altura')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>


    <div class="mb-4">
        <label for="fechaNacimiento" class="block text-lg font-semibold text-gray-700">Fecha de Nacimiento</label>
        <input type="date" name="fechaNacimiento" id="fechaNacimiento" value="{{old('fechaNacimiento')}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('fechaNacimiento')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>


    <div class="mb-4">
        <label for="imagen" class="block text-lg font-semibold text-gray-700">Imagen</label>
        <input type="file" name="imagen" id="imagen" value="{{old('imagen')}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" accept="image/*">
        @error('imagen')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>


    <div class="mb-4">
        <label for="alimentacion" class="block text-lg font-semibold text-gray-700">Alimentación</label>
        <input type="text" name="alimentacion" id="alimentacion" value="{{old('alimentacion')}}" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
        @error('alimentacion')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>


    <div class="mb-4">
        <label for="descripcion" class="block text-lg font-semibold text-gray-700">Descripción</label>
        <textarea name="descripcion" id="descripcion"  value="{{old('descripcion')}}" rows="4" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" ></textarea>
        @error('descripcion')
        <span class="text-red-500">{{$message}}</span>
        @enderror
    </div>


    <div class="mb-4 text-center">
        <button type="submit" class="w-full py-3 bg-green-600 text-white text-lg font-semibold rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">Añadir Animal</button>

    </div>
</form>


@endsection
