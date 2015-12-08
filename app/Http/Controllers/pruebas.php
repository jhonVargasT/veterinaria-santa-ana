<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;
use App\Atencion\Apunte;
use App\Atencion\Receta;
use App\Http\Controllers\Controller;
use App\Atencion\Patologia;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceApunte();
    }

    public function agregar()
    {
        $apunte=new Apunte();
        $apunte->setDescripcion("2wpoeoqeasdwqe");
        $apunte->setIdAnimal(1);
        $apunte->setFechaApunte('1992-12-05');
        $apunte->setIdPersonal(1);
        $apunte->setIdApunte(3);

        $result=$this->service->mostrarApuntesFecha('1','1992-12-15');


           echo $result->getDescripcion()."  ".$result->getFechaApunte();


    }


}