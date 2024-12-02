<?php

namespace Funicular\Models;

/** 
 * Clase PasajeroModel
 * 
 * Esta clase representara el modelo de un pasajero de la base de datos dwes_03_funicular
 * Aqui se encuentra la capa logica con la cual vamos a tratar a los pasajeros cuando 
 * debamos realizar cualquier tipo de interaccion o modificacion con nuestra BD
 * 
 * @package Funicular\Models
 * @use Funicular\DB\Sql
 * 
 */
class PasajeroModel
{
    /**
     * @var string $dni Referencia al dni del pasajero en la BD
     */
    private string $dni;

    /**
     * @var string $nobmre Referencia al nombre del pasajero en la BD
     */
    private string $nombre;

    /**
     * @var string $sexo Referencia al sexo del pasajero en la BD
     */
    private string $sexo;

    /**
     * @var string $numero_plaza Referencia al numero de plaza del pasajero en la BD
     */
    private int $numero_plaza;


    /**
     * Constructor de la clase Pasajero.
     *
     * Inicializa una nueva instancia del objeto Pasajero.
     *
     * @return void
     */
    public function __construct() {}


    ////////////////GETTER CLASE////////////////

    /**
     * Getter del dni de la clase Pasajero.
     *
     * Retorna el dni del objeto Pasajero .
     *
     * @return string
     */
    public function getDNI(): string
    {
        return $this->dni;
    }

    /**
     * Getter del nombre de la clase Pasajero.
     *
     * Retorna el Nombre del objeto Pasajero .
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * Getter del Sexo de la clase Pasajero.
     *
     * Retorna el Sexo del objeto Pasajero.
     *
     * @return string
     */
    public function getSexo(): string
    {
        return $this->sexo;
    }

    /**
     * Getter del numero_plaza de la clase Pasajero.
     *
     * Retorna el numero de plaza del objeto Pasajero.
     *
     * @return int
     */
    public function getNumPlaza(): int
    {
        return $this->numero_plaza;
    }


    ////////////////SETTER CLASE////////////////

    /**
     * Setter del dni de la clase Pasajero.
     *
     * Modifica el dni del objeto Pasajero.
     *
     * @param string $dni nuevo del pasajero
     * @return void
     */
    public function setDNI(string $dni): void
    {
        $this->dni = $dni;
    }

    /**
     * Setter del nombre de la clase Pasajero.
     *
     * Modifica el nombre del objeto Pasajero.
     *
     * @param string $nombre nuevo del pasajero
     * @return void
     */
    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    /**
     * Setter del sexo de la clase Pasajero.
     *
     * Modifica el sexo del objeto Pasajero.
     *
     * @param string $sexo nuevo del pasajero
     * @return void
     */
    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * Setter del numero_plaza de la clase Pasajero.
     *
     * Modifica el numero_plaza del objeto Pasajero.
     *
     * @param int $numero_plaza que ocupara el pasajero
     * @return void
     */
    public function setNumPlaza(int $numero_plaza): void
    {
        $this->numero_plaza = $numero_plaza;
    }
}
