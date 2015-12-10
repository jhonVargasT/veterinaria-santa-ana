<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;
use App\Atencion\Log;
use App\Atencion\TipoAnalisis;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceTipoAnalisis();
    }

    public function agregar()
    {
        $tip=new TipoAnalisis();
        $tip->setDescripcion("asdasd21");
        $tip->setIdTipoAnalisis(1);
        $tip->setNombre('Vacuna');

        $result=$this->service->obetnerTipoAnalisis(2);


          echo  $result->getNombre();




    }


}