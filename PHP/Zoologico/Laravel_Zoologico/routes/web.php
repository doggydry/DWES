<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\CuidadorController;
use App\Http\Controllers\RevisionesController;
use App\Http\Controllers\InicioController;
use App\Models\Titulacion;

Route::get('/', InicioController::class)->name('inicio');

// Rutas para el controlador Animal
Route::get('animales', [AnimalController::class, 'index'])->name('animales.index');
Route::get('animales/crear', [AnimalController::class, 'create'])->name('animales.create')->middleware('auth');
Route::get('animales/{animal}/editar', [AnimalController::class, 'edit'])->name('animales.edit')->middleware('auth');
Route::get('animales/{animal}', [AnimalController::class, 'show'])->name('animales.show');
Route::post('animales', [AnimalController::class, 'store'])->name('animales.store')->middleware('auth');
Route::put('animales/{animal}', [AnimalController::class, 'update'])->name('animales.update')->middleware('auth');

// Rutas para el controlador Revisiones
Route::get('revisiones/{animal}/crear', [RevisionesController::class, 'create'])->name('revisiones.createRevision');
Route::post('revisiones/{animal}', [RevisionesController::class, 'store'])->name('revisiones.store');

//Rutas para el controlador de Cuidadores
Route::get('cuidador/{cuidador:slug}',[CuidadorController::class,'show'])->name('cuidador.show');




