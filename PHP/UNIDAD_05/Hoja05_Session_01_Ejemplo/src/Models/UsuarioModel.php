<?php

namespace Funicular\Models;

/**
 * Clase UsuarioModel
 * 
 * Esta clase representara el modelo de un usuario de la base de datos dwes_03_funicular
 * Aqui se encuentra la capa logica con la cual vamos a tratar a los usuarios cuando 
 * debamos realizar cualquier tipo de interaccion o modificacion con nuestra BD
 * 
 * @package Funicular\Models
 */
class UsuarioModel
{
    /**
     * @var int $id_usuario identificador del usuario
     */
    private int $id_usuario;
    /**
     * @var string $nombre  del usuario
     */
    private string $nombre;
    /**
     * @var string $contrasena del usuario guardada en la BD a traves de hash-bcrypt
     */
    private string $contrasena;

    /**
     * Constructor de la clase
     * 
     * Funcion para inicializar el objeto de la clase Usuario.
     * No deberiamos de pasarle ningun parametro a la funcion debido a que vamos a obtenerlo de 
     * la base de datos a traves de un fetch de PDO::FETCH_CLASS de la clase Usuario::class
     */
    public function __construct(
        /*
        int $id_usuario = null, 
        string $nombre = null,
        string $contrasena = null,
        */)
    {
        /*
            $this->id_usuario = $id_usuario;
            $this->nombre = $nombre;
            $this->contrasena = $contrasena;       
        */
    }

    ////////////////GETTER CLASE////////////////

    /**
     * Getter para retornar el id del usuario
     * @return int $id_usuario
     */
    public function getIDUsuario(): int
    {
        return $this->id_usuario;
    }

    /**
     * Getter para retornar el id del usuario
     * @return string $nombre
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Getter para retornar la contraseña del usuario
     * @return int $contrasena
     */
    public function getContrasena(): string
    {
        return $this->contrasena;
    }

    ////////////////SETTER CLASE////////////////

    /**
     * Setter para actualizar el nombre del usuario
     * 
     * @param string $nombre nuevo del usuario
     * @return void
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Setter para actualizar la contraseña del usuario
     * 
     * @param string $contrasena nueva del usuario
     * @return void
     */
    public function setContrasena(string $contrasena): void
    {
        $this->contrasena = $contrasena;
    }
}
