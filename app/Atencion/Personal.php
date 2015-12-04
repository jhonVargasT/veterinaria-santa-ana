<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 3/12/2015
 * Time: 11:30 PM
 */

namespace App\Atencion;
use App\Persona;

class Personal extends Persona
{
    private $idPersonal;
    private $privilegios;
    private $usuarioPersonal;
    private $paswoordPersonal;
    private $idPersona;
    private $idTipoPersonal;

    /**
     * Personal constructor.
     * @param $idPersonal
     * @param $privilegios
     * @param $usuarioPersonal
     * @param $paswoordPersonal
     * @param $idPersona
     * @param $idTipoPersonal
     */
    public function __construct($idPersonal, $privilegios, $usuarioPersonal, $paswoordPersonal, $idPersona, $idTipoPersonal,$idPersona,
                                $nombre, $apellido, $sexo, $docuIdent,
                                $fechaNacimiento, $email, $ciudad, $direccion,
                                $referenciasLocali, $telefonoFijo, $telefonoMobil)
    {
        parent::__construct($idPersona, $nombre,
            $apellido, $sexo, $docuIdent, $fechaNacimiento,
            $email, $ciudad, $direccion, $referenciasLocali,
            $telefonoFijo, $telefonoMobil);

        $this->idPersonal = $idPersonal;
        $this->privilegios = $privilegios;
        $this->usuarioPersonal = $usuarioPersonal;
        $this->paswoordPersonal = $paswoordPersonal;
        $this->idPersona = $idPersona;
        $this->idTipoPersonal = $idTipoPersonal;
    }

    /**
     * @return mixed
     */
    public function getIdPersonal()
    {
        return $this->idPersonal;
    }

    /**
     * @param mixed $idPersonal
     */
    public function setIdPersonal($idPersonal)
    {
        $this->idPersonal = $idPersonal;
    }

    /**
     * @return mixed
     */
    public function getPrivilegios()
    {
        return $this->privilegios;
    }

    /**
     * @param mixed $privilegios
     */
    public function setPrivilegios($privilegios)
    {
        $this->privilegios = $privilegios;
    }

    /**
     * @return mixed
     */
    public function getUsuarioPersonal()
    {
        return $this->usuarioPersonal;
    }

    /**
     * @param mixed $usuarioPersonal
     */
    public function setUsuarioPersonal($usuarioPersonal)
    {
        $this->usuarioPersonal = $usuarioPersonal;
    }

    /**
     * @return mixed
     */
    public function getPaswoordPersonal()
    {
        return $this->paswoordPersonal;
    }

    /**
     * @param mixed $paswoordPersonal
     */
    public function setPaswoordPersonal($paswoordPersonal)
    {
        $this->paswoordPersonal = $paswoordPersonal;
    }

    /**
     * @return mixed
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param mixed $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return mixed
     */
    public function getIdTipoPersonal()
    {
        return $this->idTipoPersonal;
    }

    /**
     * @param mixed $idTipoPersonal
     */
    public function setIdTipoPersonal($idTipoPersonal)
    {
        $this->idTipoPersonal = $idTipoPersonal;
    }



}