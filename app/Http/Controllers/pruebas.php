<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 4:23 PM
 */
namespace App\Http\Controllers;

use App\Atencion\Personal;
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


        $cliente1=new Cliente();
        $cliente1->setFechaDeAfiliacion('1992-09-24');
        $cliente1->setComoConoce('no se pues');
        $cliente1->setFoto('asdasdjghj');
        $cliente1->setNombre('nadie con appas');
        $cliente1->setApellido('potatos');
        $cliente1->setSexo('F');
        $cliente1->setDocuIdent('729788564');
        $cliente1->setFechaNacimiento('1994-05-24');
        $cliente1->setEmail('juan@lol');
        $cliente1->setCiudad('Trujillo- La libertad');
        $cliente1->setDireccion('las causales');
        $cliente1->setReferenciasLocali('por la estatua');
        $cliente1->setTelefonoFijo('9535998');
        $cliente1->setTelefonoMovil('9844687');
        $cliente1->setIdPersona(23);


        $this->service->modificarCliente($cliente1);

      //$this->service->idRapido();





    }



}