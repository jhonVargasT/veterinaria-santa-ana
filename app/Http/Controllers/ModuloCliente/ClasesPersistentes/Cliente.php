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
    private $fechaDeAfiliacion;
    private $comoConoce;
    private $foto;

    public function __construct($nombre, $apellido, $sexo, $docuIdent,
                                $fechaNacimiento, $email,
                                $ciudad, $direccion, $referenciasLocali,
                                $telefonoFijo, $telefonoMobil, $fechaDeAfiliacion, $comoConoce, $foto)
    {
        parent::__construct($nombre, $apellido, $sexo, $docuIdent, $fechaNacimiento,
            $email, $ciudad, $direccion, $referenciasLocali, $telefonoFijo, $telefonoMobil);

        $this->fechaDeAfiliacion = $fechaDeAfiliacion;
        $this->comoConoce = $comoConoce;
        $this->foto = $foto;

    }


    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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


}