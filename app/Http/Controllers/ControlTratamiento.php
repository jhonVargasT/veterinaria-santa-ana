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

    public function nuevoTratamiento(Tratamiento $tratamiento,$idProtocolo)
    {
        /********* cuando instancies este metodo al pasarle la Receta no pongas la fecha de aplicacion
         * la fecha de aplicacion la pondra otro metodo por eso se puede poner null*******/

        $proto=$this->serviceProtocolo->obtenerProtocolo($idProtocolo);
        $dur=$proto->getDuracion();
       // echo $dur;
        /*********************************************/
        $fecha = strftime("%Y-%m-%d", time());
        $tratamiento->setFechaProgramacion($fecha);
       /* for($i=0;$i<$proto->getNroDosis();$i++)
        {
            if($i==0) {
                echo '<br>'. $tratamiento->getFechaAplicacion();
               echo '<br>'.$dur=$dur+$dur;
            }
            else
            {

            }
        }*/
        $fecha = date('Y-m-j');
        $nuevafecha = strtotime ( '+'+$dur+' day' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
        echo $nuevafecha;


    }
}