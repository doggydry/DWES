@extends('layouts.plantilla')
@section('titulo', 'Zoologico')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Listado de animales</h1>
    @foreach ($animales as $animal)
        <ul>
            <li>
                <a href="animales/{$animal}" class="hover:underline hover:text-blue-500"><strong>Especie: </strong>{{ $animal['especie'] }}</a>
                <strong>Peso: </strong>{{ $animal['peso'] }}cm
                <strong>Altura: </strong>{{ $animal['altura'] }}KG
                <strong>Fecha de Nacimiento: </strong>{{ $animal['fechaNacimiento'] }}
            </li>
            <br>
        </ul>
    @endforeach
@endsection
