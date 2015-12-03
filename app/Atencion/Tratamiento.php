<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 3/12/2015
 * Time: 2:12 PM
 */
class Tratamiento
{
    private $idTratamiento;
    private $fechaProgramacion;
    private $FechaAplicacion;
    private $lote;
    private $fechaAtencion;
    private $laboratorio;
    private $idTipoTratamiento;
    private $idAnimal;
    private $IdPersonal;

    /**
     * Tratamiento constructor.
     * @param $fechaProgramacion
     * @param $FechaAplicacion
     * @param $lote
     * @param $fechaAtencion
     * @param $laboratorio
     * @param $idTipoTratamiento
     * @param $idAnimal
     * @param $IdPersonal
     */

    public function __construct($fechaProgramacion, $FechaAplicacion, $lote, $fechaAtencion, $laboratorio, $idTipoTratamiento, $idAnimal, $IdPersonal)
    {
        $this->fechaProgramacion = $fechaProgramacion;
        $this->FechaAplicacion = $FechaAplicacion;
        $this->lote = $lote;
        $this->fechaAtencion = $fechaAtencion;
        $this->laboratorio = $laboratorio;
        $this->idTipoTratamiento = $idTipoTratamiento;
        $this->idAnimal = $idAnimal;
        $this->IdPersonal = $IdPersonal;
    }


    /**
     * @return mixed
     */
    public function getIdTratamiento()
    {
        return $this->idTratamiento;
    }

    /**
     * @param mixed $idTratamiento
     */
    public function setIdTratamiento($idTratamiento)
    {
        $this->idTratamiento = $idTratamiento;
    }

    /**
     * @return mixed
     */
    public function getFechaProgramacion()
    {
        return $this->fechaProgramacion;
    }

    /**
     * @param mixed $fechaProgramacion
     */
    public function setFechaProgramacion($fechaProgramacion)
    {
        $this->fechaProgramacion = $fechaProgramacion;
    }

    /**
     * @return mixed
     */
    public function getFechaAplicacion()
    {
        return $this->FechaAplicacion;
    }

    /**
     * @param mixed $FechaAplicacion
     */
    public function setFechaAplicacion($FechaAplicacion)
    {
        $this->FechaAplicacion = $FechaAplicacion;
    }

    /**
     * @return mixed
     */
    public function getLote()
    {
        return $this->lote;
    }

    /**
     * @param mixed $lote
     */
    public function setLote($lote)
    {
        $this->lote = $lote;
    }

    /**
     * @return mixed
     */
    public function getFechaAtencion()
    {
        return $this->fechaAtencion;
    }

    /**
     * @param mixed $fechaAtencion
     */
    public function setFechaAtencion($fechaAtencion)
    {
        $this->fechaAtencion = $fechaAtencion;
    }

    /**
     * @return mixed
     */
    public function getLaboratorio()
    {
        return $this->laboratorio;
    }

    /**
     * @param mixed $laboratorio
     */
    public function setLaboratorio($laboratorio)
    {
        $this->laboratorio = $laboratorio;
    }

    /**
     * @return mixed
     */
    public function getIdTipoTratamiento()
    {
        return $this->idTipoTratamiento;
    }

    /**
     * @param mixed $idTipoTratamiento
     */
    public function setIdTipoTratamiento($idTipoTratamiento)
    {
        $this->idTipoTratamiento = $idTipoTratamiento;
    }

    /**
     * @return mixed
     */
    public function getIdAnimal()
    {
        return $this->idAnimal;
    }

    /**
     * @param mixed $idAnimal
     */
    public function setIdAnimal($idAnimal)
    {
        $this->idAnimal = $idAnimal;
    }

    /**
     * @return mixed
     */
    public function getIdPersonal()
    {
        return $this->IdPersonal;
    }

    /**
     * @param mixed $IdPersonal
     */
    public function setIdPersonal($IdPersonal)
    {
        $this->IdPersonal = $IdPersonal;
    }



}