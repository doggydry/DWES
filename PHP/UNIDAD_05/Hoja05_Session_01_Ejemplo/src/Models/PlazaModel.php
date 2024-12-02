<?php

namespace Funicular\Models;

/**
 * 
 * Clase PlazaModel
 * 
 * Esta clase representara el modelo de una plaza de la base de datos dwes_03_funicular
 * Aqui se encuentra la capa logica con la cual vamos a tratar a las plazas cuando 
 * debamos realizar cualquier tipo de interaccion o modificacion con nuestra BD
 * 
 * @package Funicular\Models
 * 
 * 
 */
class PlazaModel
{

    /**
     * @var int $numero identificador de la plaza
     */
    private int $numero;

    /**
     * @var bool $reservada comprobador de su reserva
     */
    private bool $reservada;

    /**
     * @var float $precio precio de la plaza
     */
    private float $precio;

    /**
     * @var string $dni_pasajero dni de la plaza
     */
    private string $dni_pasajero;


    /**
     * Constructor de la clase Plaza.
     *
     * Inicializa una nueva instancia del objeto Plaza.
     */
    public function __construct() {}

    ////////////////GETTER CLASE////////////////

    /**
     * Getter del numero de la clase Plaza.
     *
     * Retorna el numero del objeto Plaza.
     *
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * Getter de la reserva de la clase Plaza.
     *
     * Retorna la reserva del objeto Plaza.
     *
     * @return string
     */
    public function getReservada(): bool
    {
        return $this->reservada;
    }

    /**
     * Getter del precio de la clase Plaza.
     *
     * Retorna el precio del objeto Plaza.
     *
     * @return string
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * Getter del precio de la clase Plaza.
     *
     * Retorna el precio del objeto Plaza.
     *
     * @return string
     */
    public function getDNI(): string
    {
        return $this->dni_pasajero;
    }

    ////////////////SETTER CLASE////////////////

    /**
     * Setter del numero de la clase Plaza.
     *
     * Modifica el numero del objeto Plaza.
     *
     * @param string $numero nuevo de la plaza
     * @return void
     */
    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    /**
     * Setter de la reserva de la clase Plaza.
     *
     * Modifica la reserva del objeto Plaza.
     *
     * @param bool $reservada cambio en la plaza
     * @return void
     */
    public function setReservada(bool $reservada): void
    {
        $this->reservada = $reservada;
    }

    /**
     * Setter del precio de la clase Plaza.
     *
     * Modifica el precio del objeto Plaza.
     *
     * @param float $precio nuevo de la plaza
     * @return void
     */
    public function setPrecio(float $precio): void
    {
        $this->precio = $precio;
    }

    /**
     * Setter del precio de la clase Plaza.
     *
     * Modifica el precio del objeto Plaza.
     *
     * @param string $dni_pasajero nuevo en la plaza
     * @return void
     */
    public function setDNI(string $dni_pasajero): void
    {
        $this->dni_pasajero = $dni_pasajero;
    }
}
