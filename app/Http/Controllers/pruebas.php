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
use App\Atencion\TipoAnalisis;
use App\Atencion\TipoTratamiento;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceTipoTratamiento();
    }

    public function agregar()
    {
        $tip=new TipoTratamiento();
        $tip->setDescripcion('veneno');
        $tip->setNombreTipoTratamiento('bala');
        $tip->setIdTipoTratiemnto(2);
         $result=$this->service->obtenerTiposTratamiento();
          for($i=0;$i<count($result);$i++) {
                echo $result[$i]->getNombreTipoTratamiento();


            }
      /*  $result=$this->service->obetnerTipoTratamiento(2);
        echo $result->getDescripcion();*/


    }


}