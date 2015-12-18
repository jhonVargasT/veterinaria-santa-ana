<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;

use App\Atencion\Atencion;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceAtencion();
    }

    public function agregar()
    {

       /* $atencion=new Atencion();

        $atencion->setIdAnimal(1);
        $atencion->setDescripcion('asdasd');
        $atencion->setIdTipoAtencion(1);
        $atencion->setIdPersonal(1);
        $atencion->setResumen('fafitas con arroz frito');
        $atencion->setFechaAtencion('2000-11-04');
        $atencion->setIdAtencion(1);

        $this->service->eliminarAtencion(1);*/

       $result= $this->service->obtenerAtenciones();

        for($i=0;$i<count($result);$i++)
        {
           echo $result[$i]->getFechaAtencion();

        }


    }



}