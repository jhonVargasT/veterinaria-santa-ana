<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;

use App\Atencion\Atencion;
use App\Atencion\Retorno;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceRetorno();
    }

    public function agregar()
    {
        $retorno=new Retorno();
        $retorno->setIdTipoAtencion(2);
        $retorno->setFechaRetorno('1992-11-05');
        $retorno->setObservacion('shishibelos');
        $retorno->setHoraRetorno('01:02:03');
        $retorno->setIdAtencion(1);
        $retorno->setIdRetorno(4);

        $result=$this->service->obetnerRetornoAtencion(2);

            echo $result->getObservacion();


    }



}