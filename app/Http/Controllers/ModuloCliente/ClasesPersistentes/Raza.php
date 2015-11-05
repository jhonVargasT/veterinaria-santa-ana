<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/11/2015
 * Time: 1:10 PM
 */

namespace App\Http\Controllers;


class Raza extends controller
{
    public $nombreRaza;
    public $estiloPiel;
    public $Especie;

    /**
     * Raza constructor.
     * @param $nombreRaza
     * @param $estiloPiel
     * @param $Especie
     */
    public function __construct($nombreRaza, $estiloPiel,Especie $Especie)
    {
        $this->nombreRaza = $nombreRaza;
        $this->estiloPiel = $estiloPiel;
        $this->Especie = $Especie;
    }

    /**
     * @return mixed
     */
    public function getNombreRaza()
    {
        return $this->nombreRaza;
    }

    /**
     * @param mixed $nombreRaza
     */
    public function setNombreRaza($nombreRaza)
    {
        $this->nombreRaza = $nombreRaza;
    }

    /**
     * @return mixed
     */
    public function getEstiloPiel()
    {
        return $this->estiloPiel;
    }

    /**
     * @param mixed $estiloPiel
     */
    public function setEstiloPiel($estiloPiel)
    {
        $this->estiloPiel = $estiloPiel;
    }

    /**
     * @return Especie
     */
    public function getEspecie()
    {
        return $this->Especie;
    }

    /**
     * @param Especie $Especie
     */
    public function setEspecie($Especie)
    {
        $this->Especie = $Especie;
    }


}