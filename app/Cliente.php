<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 4/11/2015
 * Time: 10:55 PM
 */
namespace App;

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

    public function getIdPersona()
    {
        return parent::getIdPersona(); // TODO: Change the autogenerated stub
    }

    public function setIdPersona($idPersona)
    {
        parent::setIdPersona($idPersona); // TODO: Change the autogenerated stub
    }

    public function getNombre()
    {
        return parent::getNombre(); // TODO: Change the autogenerated stub
    }

    public function setNombre($nombre)
    {
        parent::setNombre($nombre); // TODO: Change the autogenerated stub
    }

    public function getApellido()
    {
        return parent::getApellido(); // TODO: Change the autogenerated stub
    }

    public function setApellido($apellido)
    {
        parent::setApellido($apellido); // TODO: Change the autogenerated stub
    }

    public function getSexo()
    {
        return parent::getSexo(); // TODO: Change the autogenerated stub
    }

    public function setSexo($sexo)
    {
        parent::setSexo($sexo); // TODO: Change the autogenerated stub
    }

    public function getDocuIdent()
    {
        return parent::getDocuIdent(); // TODO: Change the autogenerated stub
    }

    public function setDocuIdent($docuIdent)
    {
        parent::setDocuIdent($docuIdent); // TODO: Change the autogenerated stub
    }

    public function getFechaNacimiento()
    {
        return parent::getFechaNacimiento(); // TODO: Change the autogenerated stub
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        parent::setFechaNacimiento($fechaNacimiento); // TODO: Change the autogenerated stub
    }

    public function getEmail()
    {
        return parent::getEmail(); // TODO: Change the autogenerated stub
    }

    public function setEmail($email)
    {
        parent::setEmail($email); // TODO: Change the autogenerated stub
    }

    public function getCiudad()
    {
        return parent::getCiudad(); // TODO: Change the autogenerated stub
    }

    public function setCiudad($ciudad)
    {
        parent::setCiudad($ciudad); // TODO: Change the autogenerated stub
    }

    public function getDireccion()
    {
        return parent::getDireccion(); // TODO: Change the autogenerated stub
    }

    public function setDireccion($direccion)
    {
        parent::setDireccion($direccion); // TODO: Change the autogenerated stub
    }

    public function getReferenciasLocali()
    {
        return parent::getReferenciasLocali(); // TODO: Change the autogenerated stub
    }

    public function setReferenciasLocali($referenciasLocali)
    {
        parent::setReferenciasLocali($referenciasLocali); // TODO: Change the autogenerated stub
    }

    public function getTelefonoFijo()
    {
        return parent::getTelefonoFijo(); // TODO: Change the autogenerated stub
    }

    public function setTelefonoFijo($telefonoFijo)
    {
        parent::setTelefonoFijo($telefonoFijo); // TODO: Change the autogenerated stub
    }

    public function getTelefonoMovil()
    {
        return parent::getTelefonoMovil(); // TODO: Change the autogenerated stub
    }

    public function setTelefonoMovil($telefonoMovil)
    {
        parent::setTelefonoMovil($telefonoMovil); // TODO: Change the autogenerated stub
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