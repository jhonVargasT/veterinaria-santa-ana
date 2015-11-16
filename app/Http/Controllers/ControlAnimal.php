<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/11/2015
 * Time: 4:48 PM
 */
namespace App\Http\Controllers;
use BD;
class  ControlAnimal extends Controller
{
    private $serviceAnimal;
    private $serviceEspecie;
    private $serviceRaza;

    function __construct()
    {
        $this->serviceAnimal=new ServiceAnimal();
        $this->serviceEspecie=new ServiceEspecie();
        $this->serviceRaza=new ServiceRaza();
    }

    public function  listarAnimales()
    {
      return  $animal=$this->serviceAnimal->listarAnimalesDeCliente(1);
    }

    /*public function  buscarAnimal()
    {}
    public function editarAnimal(){}
    public function nuevoAnimal(){}
    public function eliminarAnimal(){}*/

}