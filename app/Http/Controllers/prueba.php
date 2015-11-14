<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 11/11/2015
 * Time: 6:33 PM
 */

namespace App\Http\Controllers;


class prueba extends Controller
{
    public  $cliente;

    /**
     * prueba constructor.
     * @param $persona
     */
    public function __construct()
    {
        $this->cliente = new ServiceCliente();
    }
    public function prueba()
    {
       $cliente = $this->cliente->listarClientes();
       for($i=0;$i<count($cliente);$i++)
       {
        echo $cliente[$i]->getIdCliente(). $cliente[$i]->getNombre();
       }

    }



}