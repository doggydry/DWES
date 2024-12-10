<?php
namespace App\Ficheros;

session_start();
function flash(string $clave, string $mensaje = null): string|null
{
    // Si se pasa un mensaje, guardarlo con la clave en la sesion flash
    if ($mensaje !== null) {
        $_SESSION['flash'][$clave] = $mensaje;
        return $mensaje;
    }

    //? Si el mensaje no se pasa, se intenta recuperar y se elimina su clave
    if (isset($_SESSION['flash'][$clave])) {
        $mensajeGuardado = $_SESSION['flash'][$clave];
        unset($_SESSION['flash'][$clave]);
        return $mensajeGuardado;
    }

    //? Si no hay ni mensaje ni clave, devolver null
    return null;
}


//? Verifica si la sesion esta iniciada
function iniciar_sesion()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

//? Verifica si existe la clave usuario en la sesion
function estaLogueado(): bool
{
    return isset($_SESSION['usuario']);
}

//? Redirecciona a la pagina que se pase por parametro
function redireccionar(string $path)
{
    header("Location: {$path}");
    exit;
}

//? Comprueba que el metodo de la llamada ha sido realizado por post
function esPost(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}
