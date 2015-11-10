<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 4/11/2015
 * Time: 10:55 PM
 */
namespace App\Http\Controllers;
class Cliente extends Persona
{
    private $idCliente;
    private $fechaDeAfiliacion;
    private $comoConoce;
    private $foto;

    public function __construct

    ($idCliente, $fechaDeAfiliacion,$comoConoce, $foto,$idPersona,
     $nombre, $apellido, $sexo, $docuIdent,
     $fechaNacimiento, $email, $ciudad, $direccion,
     $referenciasLocali, $telefonoFijo, $telefonoMobil)
    {
        parent::__construct($idPersona, $nombre,
            $apellido, $sexo, $docuIdent, $fechaNacimiento,
            $email, $ciudad, $direccion, $referenciasLocali,
            $telefonoFijo, $telefonoMobil);
      $this->idCliente= $idCliente;
       $this->fechaDeAfiliacion=$fechaDeAfiliacion;
        $this->comoConoce=$comoConoce;

    }


    /**
     * @return mixed
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * @param mixed $idCliente
     */
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * @return mixed
     */
    public function getFechaDeAfiliacion()
    {
        return $this->fechaDeAfiliacion;
    }

    /**
     * @param mixed $fechaDeAfiliacion
     */
    public function setFechaDeAfiliacion($fechaDeAfiliacion)
    {
        $this->fechaDeAfiliacion = $fechaDeAfiliacion;
    }

    /**
     * @return mixed
     */
    public function getComoConoce()
    {
        return $this->comoConoce;
    }

    /**
     * @param mixed $comoConoce
     */
    public function setComoConoce($comoConoce)
    {
        $this->comoConoce = $comoConoce;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }




}