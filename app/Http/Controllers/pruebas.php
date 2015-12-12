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
use App\Atencion\Protocolo;
use App\Atencion\TipoAnalisis;
use App\Atencion\TipoPersonal;
use App\Atencion\TipoTratamiento;
use App\Atencion\Tratamiento;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceTipoPersonal();
    }

    public function agregar()
    {
        $tip=new TipoPersonal();
        $tip->setNombreTipoPersonal('llimpia caca');
        $tip->setDescripcion('lava gatos de mierda');
        $tip->setIdTipoPersonal(1);

        $result=$this->service->mostrarTipoPersonal(2);
        echo $result->getNombreTipoPersonal().'<br>';
    /* for($i=0;$i<count($result);$i++)
        {
            echo $result[$i]->getNombreTipoPersonal().'<br>';
        }*/
    }



}