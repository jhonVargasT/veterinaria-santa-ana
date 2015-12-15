<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;
use App\Atencion\Analisis;
use App\Atencion\Log;
use App\Atencion\Personal;
use App\Atencion\Protocolo;
use App\Atencion\TipoAnalisis;
use App\Atencion\TipoPersonal;
use App\Atencion\TipoTratamiento;
use App\Atencion\Tratamiento;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServicePersonal();
    }

    public function agregar()
    {
        $per=new Personal();
        $per->setDocuIdent('72978792');
        $per->setNombre('Vanessa Jackeline');
        $per->setApellido('Rojas Pajuelo');
        $per->setSexo('f');
        $per->setFechaNacimiento('1988-08-11');
        $per->setEmail('Vanepanepansaderta@gmail.com');
        $per->setCiudad('VAlentia');
        $per->setDireccion('Las manzanas verdes');
        $per->setReferenciasLocali('por la casita');
        $per->setTelefonoFijo('950938108');
        $per->setTelefonoMovil('459826');
        $per->setPrivilegios('ptassecas');
        $per->setUsuarioPersonal('Lavaca');
        $per->setPaswoordPersonal('kjqwheq');
        $per->setIdTipoPersonal(1);
        $per->setIdPersona(2);

        echo $this->service->nuevoPersonal($per);
    /* for($i=0;$i<count($result);$i++)
        {
            echo $result[$i]->getNombreTipoPersonal().'<br>';
        }*/
    }



}