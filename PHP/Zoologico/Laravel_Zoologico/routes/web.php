<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\InicioController;

Route::get('/',InicioController::class)->name('inicio');
Route::get('animales',[AnimalController::class,'index']);
Route::get('animales/crear',[AnimalController::class,'create']);
Route::get('animales/{animal}',[AnimalController::class,'show']);
Route::get('animales/{animal}/editar',[AnimalController::class,'edit']);



