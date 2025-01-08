<?php

function redireccionar(string $uri)
{
    header("Location:{$uri}");
    exit;
}

function esPost()
{

    return $_SERVER['REQUEST_METHOD'] === "POST";
}

function flash(string $clave, string $mensaje = null): ?string
{
    if (isset($_SESSION[$clave])) {
        $mensaje = $_SESSION[$clave];
        unset($_SESSION[$clave]);
        return $mensaje;
    } else {
        $_SESSION[$clave] = $mensaje;
        return null;
    }
}

function iniciar_sesion(): void
{
    if (session_status() === PHP_SESSION_NONE) session_start();
}

function estaLogueado(): bool
{
    return isset($_SESSION['usuario']);
}
