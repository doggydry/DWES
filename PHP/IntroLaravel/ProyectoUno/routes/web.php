<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Job;
 /**
  * Vamos a meter el array de jobs en una clase para
  */



Route::get('/', function () {
    return view('home');
});
Route::get('/contact', function () {
    return view('contact');
});

/**
 * Hemos extraido el array de jobs para ponerlo como una variable global,
 * y así usando use podemos usar una closure para recorrerlo
 *
 */
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::all()
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    // dd() -> dump and die
    /*
      Como un foreach, $job es igual al contenido de los primeros corchetes, etc...
      Devuelve un booleano. Al ser una closure (función anónima), no tenemos espacio al contenido de fuera,
      asi que NO podemos usar directamente el $id, si queremos usar una variable externa
      deberemos usar el use ($id)
    */
    // Illuminate\Support\Arr::first($jobs, function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });

    /*
    Otra forma de recorrer los jobs sin tener que usar una closure es usando una short funciton (fn), que hace exactamente lo mismo
    pero esta si que tiene acceso a las variables del exterior por lo que no nos da el problema del use
    Puede ser más liosa en un principio pero recomendable siempre que se pueda. (IR A LA CLASE JOB.PHP)
    */
    $job = Job::find($id);
    return view ('job',['job'=>$job]);
});
