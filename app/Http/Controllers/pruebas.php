<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;

use App\Atencion\Personal;
use App\Atencion\Peso;
use App\Cliente;
use Mockery\Exception;

class pruebas extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service=new ServiceCliente();
    }

    public function agregar()
    {


         $peso=new Peso();


        $cliente = $this->service->listarClientes();

        for ($i = 0; $i < count($cliente);$i++) {

            echo $cliente[$i]->getApellido().$cliente[$i]->getIdPersona().
                $cliente[$i]->getCiudad();

        }

    }



}