@extends('layouts.plantilla')
@section('titulo','Zoologico')
@section('contenido')
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
        <img src="{{ asset('assets/images/'.$animal->slug.'.jpg') }}" alt="{{ $animal->especie }}" class="h-80 w-80 object-cover rounded-lg shadow-lg">
    </div>
</div>

{{--
    <form action="{{ route('animales.edit', $animal) }}" method="POST" enctype="multipart/form-data" class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-md">
@csrf
<div class="mb-4 text-center">
    <button type="submit" class="w-full py-3 bg-blue-600 text-white text-lg font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Modificar Animal</button>
</div> --}}
</div>
@endsection
