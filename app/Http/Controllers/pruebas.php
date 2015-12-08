<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;
use App\Atencion\Apunte;
use App\Atencion\Documento;
use App\Atencion\Receta;
use App\Http\Controllers\Controller;
use App\Atencion\Patologia;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceDocumento();
    }

    public function agregar()
    {
        $doc=new Documento();
        $doc->setTipoDocumento('fafitas');
        $doc->setUbicacionDocunemto('wqewqe/wqeqwe');
        $doc->setIdAnimal(1);
        $doc->setIdPersonal(1);
        $doc->setIdDocumento(2);

        echo $this->service->eliminarDocumento(1);


    }


}