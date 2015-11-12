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
    public  $persona;

    /**
     * prueba constructor.
     * @param $persona
     */
    public function __construct()
    {
        $this->persona = new ServicePersona();
    }
    public function prueba()
    {
       $personas=  $this->persona->obtenerPersona(1);
        echo $personas->getNombre().$personas->getApellido();

    }

}