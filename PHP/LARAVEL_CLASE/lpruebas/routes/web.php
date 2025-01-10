<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Esta es la pagina principal';
});
Route::get('/animales', function () {
    return 'Listado de animales:
    ·Monos,
    ·Higuanas,
    ·Zebras,
    ·Leones,
    ·Hienas,
    ·oros';
});
Route::get('/animales{animal}', function ($animal) {
    $txt = 'Informacion sobre'.$animal;
    return $txt;

});
Route::get('/animales/crear', function () {
    return 'Pagina para añadir un animal';
});
Route::get('/animales/{animal}/editar', function () {
    return 'Pagina para modificar un animal';
});


