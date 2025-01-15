@extends('layouts.plantilla')
@section('titulo','Zoologico')
@section('contenido')
<h1 class="text-3xl font-bold underline">Informacion sobre los animales</h1>
@foreach ($animales as $animal)
<ul>
    <li>Nombre: {{$animal['especie']}}</li>
</ul>
@endforeach
@endsection
