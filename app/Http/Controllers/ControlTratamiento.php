<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 24/12/2015
 * Time: 4:36 PM
 */

namespace App\Http\Controllers;


use App\Atencion\Protocolo;
use App\Atencion\Receta;
use App\Atencion\Tratamiento;
use Faker\Provider\cs_CZ\DateTime;


class ControlTratamiento extends Controller
{
    private $serviceProtocolo;
    private $serviceTratamiento;
    private $serviceTipoTratamiento;

    public function __construct()
    {
        $this->serviceTratamiento = new ServiceTratamiento();
        $this->serviceProtocolo = new ServiceProtocolo();
        $this->serviceTipoTratamiento = new ServiceTipoTratamiento();
    }

    public function nuevoProtocolo(Protocolo $protocolo)
    {
        $result = $this->serviceProtocolo->nuevoProtocolo($protocolo);
        if ($result) {
            return 'Protocolo agregado correctamente';
        } else {
            return 'Error ala agregar protocolo';
        }
    }

    public function editarProtocolo(Protocolo $protocolo)
    {
        $result = $this->serviceProtocolo->editarProtocolo($protocolo);
        if ($result) {
            return 'Protocolo agregado correctamente';
        } else {
            return 'Error ala agregar protocolo';
        }
    }

    public function eliminarPotocolo($idProtocolo)
    {
        $result = $this->serviceProtocolo->eliminarProtocolo($idProtocolo);
        if ($result) {
            return 'Protocolo eliminado correctamente';
        } else {
            return 'Error al eliminar protocolo';
        }
    }

    public function obtenerProtocolos()
    {
        $result = $this->serviceProtocolo->obtenerProtocolos();
        if ($result == null) {
            return 'Datos no encontrados';
        } else {
            return $result;
        }
    }

    public function obtnereProtocoloNombre($nombreProtocolo)
    {

        $result = $this->serviceProtocolo->obtenerProtocoloPorNombre($nombreProtocolo);
        if ($result == null) {
            return 'Datos no encontrados';
        } else {
            return $result;
        }
    }

    public function obtenerProtocolo($idProtocolo)
    {
        $result = $this->serviceProtocolo->obtenerProtocolo($idProtocolo);
        if ($result == null) {
            return 'Datos no encontrados';
        } else {
            return $result;
        }
    }

    public function nuevoTratamiento(Tratamiento $tratamiento, $idProtocolo)
    {
        /********* cuando instancies este metodo al pasarle la Receta no pongas la fecha de aplicacion
         * la fecha de aplicacion la pondra otro metodo por eso se puede poner null*******/

        $proto = $this->serviceProtocolo->obtenerProtocolo($idProtocolo);
        $dur = $proto->getDuracion();
        $fecha = strftime("%Y-%m-%d", time());
        $tratamiento->setFechaAtencion($fecha);
        $dura = 0;
        for ($i = 0; $i < $proto->getNroDosis(); $i++) {

            if ($i == 0) {
                $fechaAp = $tratamiento->getFechaProgramacion();
                $fecha_final = date("Y-m-d", strtotime("$fechaAp ")) . '<br>';
                $tratamiento->setFechaProgramacion($fecha_final);
                $this->serviceTratamiento->nuevoTratamiento($tratamiento);
                $tratamiento->setFechaProgramacion($fechaAp);

            } else {
                $dura = $dura + $dur;
                $fechaAp = $tratamiento->getFechaProgramacion();
                $fecha_final = date("Y-m-d", strtotime("$fechaAp + $dura days")) . '<br>';
                $tratamiento->setFechaProgramacion($fecha_final);
                $this->serviceTratamiento->nuevoTratamiento($tratamiento);
                $tratamiento->setFechaProgramacion($fechaAp);
            }
        }

    }

    public function aplicarTratamiento($idTratamiento)
    {
            $resut=$this->serviceTratamiento->obtenerTratamiento($idTratamiento);
            $fecha = strftime("%Y-%m-%d", time());
            $resut->setFechaAplicacion($fecha);
        if($resut->getFechaProgramacion()==$fecha)
        {
            $this->serviceTratamiento->editarFechaAplicacion($idTratamiento,$fecha);
        }
        else{

            $this->serviceTratamiento->editarFechaAplicacion($idTratamiento,$fecha);
            $result = $this->serviceTratamiento->buscarTratamientosContinuos
            ($resut->getFechaAtencion(),$resut->getIdAnimal());
            $tipoTrata=$this->serviceTipoTratamiento->mostrarTipoTratamiento($resut->getIdTipoTratamiento());
            $proto=$this->serviceProtocolo->obtenerProtocolo($tipoTrata->get)

            for ($i = 0; $i < count($result); $i++) {

                echo  $result[$i]->getIdTratamiento();
                echo $result[$i]->getFechaProgramacion();
                echo $result[$i]->getFechaAplicacion();
                echo  $result[$i]->getLote();
                echo $result[$i]->getFechaAtencion();
                echo  $result[$i]->getLaboratorio();
                echo $result[$i]->getIdTipoTratamiento();
                echo $result[$i]->getIdAnimal();
                echo $result[$i]->getIdPersonal();
                echo '<br>';

            }
            echo 'la';


        }




    }


}