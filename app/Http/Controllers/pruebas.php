<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;
use App\Atencion\Log;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceLog();
    }

    public function agregar()
    {
        $log=new Log();
        $log->setFechaLog('2000-11-25');
        $log->setTipoLog('ahk');
        $log->setDescripcion('asdasdasd');
        $log->setIdAnimal(1);
        $log->setIdLog(2);
        $this->service->mostrarLogAnimal(1);


    }


}