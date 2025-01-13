<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});
Route::get('/animals', function () {
    return view('index');
});
Route::get('/animals/{animal}', function ($animal) {
    return view('show');
});
Route::get('/animals/crear', function () {
    return view('crear');
});
Route::get('/animals/{animal}/editar', function () {
    return view('edit');
});
