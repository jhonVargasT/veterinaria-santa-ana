<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Atencion\Patologia;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServicePatologia();
    }

   /* public function agregar()
    {

        $patologia=new Patologia();
        $patologia->setIdPatologia(1);
       $patologia->setDesripcionPatologia("sad2asg3");
        $patologia->setNombrePatologia("1231223");
        echo $this->service->editarPatologia($patologia);

    }*/
    public function agregar()
    {

       $this->service->buscarPatologiaPorNombre();
    }


}