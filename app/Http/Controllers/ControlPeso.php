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

class ControlPeso extends Controller
{
    private $servicePeso;
    private $serviceLog;


    /**
     * ControlPeso constructor.
     */
    public function __construct()
    {
        $this->servicePeso = new ServicePeso();
        $this->serviceLog = new ServiceLog();
    }

    public function agregarLog($idAnimal, $nombre, $descripcion)
    {

        $log = new Log();
        $log->setIdAnimal($idAnimal);
        $log->setTipoLog($nombre);
        $log->setDescripcion($descripcion);
        $this->serviceLog->nuevoLog($log);
    }

    public function agregarPeso(Peso $peso)
    {
        $result = $this->servicePeso->agregarPeso($peso);
        if ($result) {
            $this->agregarLog($peso->getIdAnimal(), 'Peso', 'Pesar animal');
            return 'Peso agregado correctamente';
        } else {
            return 'No se pudo agregar el peso';
        }
    }

    public function editarPeso(Peso $peso)
    {
        $result = $this->servicePeso->editarPeso($peso);
        if ($result) {
            return 'Peso modificado correctamente';
        } else {
            return 'Error al modificar el peso ';
        }
    }
    /* obtiene los pesos pero con el id de un personal para verificar quien peso al animal*/
    public function obtenerPesoAnimal($idAnimal)
    {
        $result = $this->servicePeso->obtenerPesosAnimal($idAnimal);
        if ($result==null) {
            return 'Error al obtener datos ...';
        } else {
            return $result;
        }
    }
    /* obtiene los pesos pero con el id de un personal para verificar quien peso al animal*/
    public function obtenerPesosPersona($idPersonal)
    {
        $result = $this->servicePeso->obtenerPesosAnimalPesonal($idPersonal);
        if ($result==null) {
            return 'Error al obtener datos ...';
        } else {
            return $result;
        }
    }
}