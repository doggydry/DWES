<?php

function flash(string $clave, string $mensaje = null): string|null
{

    if ($mensaje != null) {
        $_SESSION['flash'][$clave] = $mensaje;
        return $mensaje;
    }

    if (isset($_SESSION['flash'][$clave])) {
        $mensajeGuardado = $_SESSION['flash'][$clave];
        unset($_SESSION['flash'][$clave]);
        return $mensajeGuardado;
    }
    return null;
}

function iniciar_sesion()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function estaLogueado(): bool
{
    return isset($_SESSION['usuario']);
}

function redireccionar(string $ruta)
{
    header("Location: $ruta");
    exit;
}
function esPost(): bool
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}
