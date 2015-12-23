<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 21/12/2015
 * Time: 6:08 PM
 */

namespace App\Http\Controllers;


use App\Atencion\Peso;
use App\Atencion\Log;

class ControlPeso extends  Controller
{
    private $servicePeso;
    private $serviceLog;


        /**
         * ControlPeso constructor.
         */
    public function __construct()
    {
        $this->servicePeso=new ServicePeso();
        $this->serviceLog=new ServiceLog();
    }

    public function agregarPeso(Peso $peso)
    {

    }
}