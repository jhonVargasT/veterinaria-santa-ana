<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/11/2015
 * Time: 11:59 AM
 */
namespace App\Http\Controllers;
class Animal extends controller
{
    private  $nombre;
    private $sexo;
    private $esterilizacion;
    private $fechaNacimiento;
    private $estado;
    private $codigo;
    private $observacion;
    private $color;
    private $pedigree;
    private $numPedigree;
    private $raza;

    /**
     * Animal constructor.
     * @param $nombre
     * @param $sexo
     * @param $esterilizacion
     * @param $fechaNacimiento
     * @param $estado
     * @param $codigo
     * @param $observacion
     * @param $color
     * @param $pedigree
     * @param $numPedigree
     * @param $raza
     */
    public function __construct($nombre, $sexo, $esterilizacion, $fechaNacimiento, $estado, $codigo, $observacion, $color, $pedigree, $numPedigree,Raza $raza)
    {
        $this->nombre = $nombre;
        $this->sexo = $sexo;
        $this->esterilizacion = $esterilizacion;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->estado = $estado;
        $this->codigo = $codigo;
        $this->observacion = $observacion;
        $this->color = $color;
        $this->pedigree = $pedigree;
        $this->numPedigree = $numPedigree;
        $this->raza = $raza;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getEsterilizacion()
    {
        return $this->esterilizacion;
    }

    /**
     * @param mixed $esterilizacion
     */
    public function setEsterilizacion($esterilizacion)
    {
        $this->esterilizacion = $esterilizacion;
    }

    /**
     * @return mixed
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * @param mixed $fechaNacimiento
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color)
    {
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getPedigree()
    {
        return $this->pedigree;
    }

    /**
     * @param mixed $pedigree
     */
    public function setPedigree($pedigree)
    {
        $this->pedigree = $pedigree;
    }

    /**
     * @return mixed
     */
    public function getNumPedigree()
    {
        return $this->numPedigree;
    }

    /**
     * @param mixed $numPedigree
     */
    public function setNumPedigree($numPedigree)
    {
        $this->numPedigree = $numPedigree;
    }

    /**
     * @return Raza
     */
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * @param Raza $raza
     */
    public function setRaza(Raza $raza)
    {
        $this->raza = $raza;
    }


}