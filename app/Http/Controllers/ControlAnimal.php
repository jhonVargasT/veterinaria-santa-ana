<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/11/2015
 * Time: 4:48 PM
 */
namespace App\Http\Controllers;
abstract class  ControlAnimal extends Controller
{



    public function __construct()
    {


    }

    public function  listarAnimales($dniCliente){}
    public function  buscarAnimal(){}
    public function editarAnimal(){}
    public function nuevoAnimal(){}
    public function eliminarAnimal(){}

}