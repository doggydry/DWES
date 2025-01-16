@extends('layouts.plantilla')
@section('titulo', 'Zoologico')
@section('contenido')
    <h1 class="text-4xl font-extrabold text-green-600 tracking-wide mb-6">Listado de animales</h1>
    {{-- Necesitamos acceder al indice de cada animal en el array, asique con
    el $index almacenamos a la posicion y lo usamos en la ruta para
    identificar cada animal de forma única --}}

    @foreach ($animales as $index => $animal)
        <ul>
            <li>
                <a href="{{ route('animales.show', $index) }}"
                    class="text-2xl hover:underline hover:text-blue-500"><strong>Especie:
                    </strong>{{ $animal['especie'] }}</a>
            </li>
            <br>
        </ul>
    @endforeach
@endsection

{{--
Por cada elemento en el arreglo $animales, el ciclo te va a dar dos cosas:
1. El índice del elemento en el array (que podemos llamar $index).
2. El valor del elemento en ese índice (que en este caso es $animal).
--}}
