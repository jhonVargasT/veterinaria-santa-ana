<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 3/12/2015
 * Time: 11:23 PM
 */

namespace App\Atencion;


class Retorno
{
    private $idRetorno;
    private $fechaRetorno;
    private $horaRetorno;
    private $observacion;
    private $idAtencionl;
    private $idTipoAtencion;

    /**
     * Retorno constructor.
     * @param $fechaRetorno
     * @param $horaRetorno
     * @param $observacion
     */
    public function __construct($fechaRetorno, $horaRetorno, $observacion)
    {
        $this->fechaRetorno = $fechaRetorno;
        $this->horaRetorno = $horaRetorno;
        $this->observacion = $observacion;
    }

    /**
     * @return mixed
     */
    public function getIdRetorno()
    {
        return $this->idRetorno;
    }

    /**
     * @param mixed $idRetorno
     */
    public function setIdRetorno($idRetorno)
    {
        $this->idRetorno = $idRetorno;
    }

    /**
     * @return mixed
     */
    public function getFechaRetorno()
    {
        return $this->fechaRetorno;
    }

    /**
     * @param mixed $fechaRetorno
     */
    public function setFechaRetorno($fechaRetorno)
    {
        $this->fechaRetorno = $fechaRetorno;
    }

    /**
     * @return mixed
     */
    public function getHoraRetorno()
    {
        return $this->horaRetorno;
    }

    /**
     * @param mixed $horaRetorno
     */
    public function setHoraRetorno($horaRetorno)
    {
        $this->horaRetorno = $horaRetorno;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param mixed $observacion
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    }

    /**
     * @return mixed
     */
    public function getIdAtencionl()
    {
        return $this->idAtencionl;
    }

    /**
     * @param mixed $idAtencionl
     */
    public function setIdAtencionl($idAtencionl)
    {
        $this->idAtencionl = $idAtencionl;
    }

    /**
     * @return mixed
     */
    public function getIdTipoAtencion()
    {
        return $this->idTipoAtencion;
    }

    /**
     * @param mixed $idTipoAtencion
     */
    public function setIdTipoAtencion($idTipoAtencion)
    {
        $this->idTipoAtencion = $idTipoAtencion;
    }


}