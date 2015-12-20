<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;

use App\Atencion\Personal;
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
       /*$personal=new Personal();
        $personal->setNombre('Jhon');
        $personal->setApellido('Vargas Traucos');
        $personal->setIdPersona(7);
        $personal->setCiudad('Chachapoyas');
        $personal->setDireccion('Jr sociego #450');
        $personal->setDocuIdent('72978798');
        $personal->setEmail('jhonvargast@gmail.com');
        $personal->setFechaNacimiento('1992-04-18');
        $personal->setUsuarioPersonal('Vargas');
        $personal->setPaswoordPersonal('vargas');
        $personal->setReferenciasLocali('por ahi mesmeto');
        $personal->setIdTipoPersonal(1);
        $personal->setPrivilegios('administradores');
        $personal->setTelefonoMovil('950938108');
        $personal->setTelefonoFijo('None');
        $personal->setSexo('M');
        echo $this->service->editarPersonal($personal);
        */

         $this->service->mostrarPersonales();

      //$this->service->idRapido();





    }



}