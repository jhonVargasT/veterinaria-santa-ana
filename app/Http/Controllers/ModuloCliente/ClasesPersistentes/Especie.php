<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/11/2015
 * Time: 12:25 PM
 */

namespace App\Http\Controllers;


class Especie extends Controller
{
    public $nombre;
    public $tipo;
    public $descripcion;
    public $tipoDePiel;

    /**
     * Especie constructor.
     * @param $nombre
     * @param $tipo
     * @param $descripcion
     */
    public function __construct($nombre, $tipo, $descripcion,$tipoDePiel)
    {
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->descripcion = $descripcion;
        $this->tipoDePiel=$tipoDePiel;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return Especifica que tipo de animal es ejmp(marino,terrrestre o volador)
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }



}