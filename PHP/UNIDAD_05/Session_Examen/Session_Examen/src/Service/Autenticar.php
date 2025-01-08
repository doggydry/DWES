<?php

namespace SessionExamen\Service;

class Autenticar
{

    public static function inicializar()
    {
        iniciar_sesion();
    }

    public static function paginaRegister()
    {
        if (estaLogueado()) {
            redireccionar('index.php?action=paginaConectado');
        } else {
            redireccionar('paginaRegister.php');
        }
    }
    public static function paginaLogin()
    {
        if (estaLogueado()) {
            redireccionar('index.php?action=paginaConectado');
        } else {
            redireccionar('paginaLogin.php');
        }
    }

    public static function paginaConectado()
    {
        if (!estaLogueado()) {
            flash('error', 'No tienes acceso a esta pagina');
            redireccionar('index.php?action=paginaLogin');
        } else {
            redireccionar('paginaConectado.php');
        }
    }

    public static function desconectarse()
    {
        session_destroy();
        redireccionar('index.php?action=paginaLogin');
    }

    public static function runAccion()
    {
        $accion = isset($_GET['action']) ? $_GET['action'] : '';

        return match ($accion) {
            'paginaRegister' => self::paginaRegister(),
            'paginaLogin' => self::paginaLogin(),
            'paginaConectado' => self::paginaConectado(),
            'desconectarse' => self::desconectarse(),
            default => redireccionar('index.php?action=paginaLogin')
        };
    }

}
