<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 4/12/2015
 * Time: 12:11 AM
 */

namespace App\Atencion;


class TipoPersonal
{
    private $idTipoPersona;
    private $nombreTipoPersonal;
    private $descripcion;

    /**
     * TipoPersonal constructor.
     * @param $idTipoPersona
     * @param $nombreTipoPersonal
     * @param $descripcion
     */
    public function __construct($idTipoPersona, $nombreTipoPersonal, $descripcion)
    {
        $this->idTipoPersona = $idTipoPersona;
        $this->nombreTipoPersonal = $nombreTipoPersonal;
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getIdTipoPersona()
    {
        return $this->idTipoPersona;
    }

    /**
     * @param mixed $idTipoPersona
     */
    public function setIdTipoPersona($idTipoPersona)
    {
        $this->idTipoPersona = $idTipoPersona;
    }

    /**
     * @return mixed
     */
    public function getNombreTipoPersonal()
    {
        return $this->nombreTipoPersonal;
    }

    /**
     * @param mixed $nombreTipoPersonal
     */
    public function setNombreTipoPersonal($nombreTipoPersonal)
    {
        $this->nombreTipoPersonal = $nombreTipoPersonal;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

}