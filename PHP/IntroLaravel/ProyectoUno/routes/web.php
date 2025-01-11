<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\JobListing;
use App\Models\Departments;

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
        'jobs' => JobListing::all()
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
    $job = JobListing::find($id);
    return view('job', ['job' => $job]);
});

/*
Usamos el modelo eloquent para acceder al metodo all que nos saca la informacion
*/
Route::get('/departments', function () {
    return view('departments', [
        'departments' => Departments::all()
    ]);
});

/*
La ruta captura el ID de la URL.
Con el metodo find(), busca el departamento correspondiente en nuestra base de datos.
Pasa el resultado a la vista 'department'.
*/
Route::get('/department/{id}', function ($id) {
    $department = Departments::find($id);
    //En la vista department va a haber disponible una variable llamada $department
    return view('department', ['department' => $department]);
});
