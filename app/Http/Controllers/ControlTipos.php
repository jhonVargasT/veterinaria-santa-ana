<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 23/12/2015
 * Time: 12:23 PM
 */

namespace App\Http\Controllers;


use App\Atencion\Tratamiento;

class ControlTipos extends Controller
{

    private $serviceTratamiento;
    private $servicePersonal;
    private $serviceAtencion;
    private $serviceAnalisis;

    /**
     * Aqui todo los metodos para agregar, modificar, eliminar y obtener los tipos.
     * todos los metodos que no devulevan objetos retornan un mensaje de confirmacion o de negacion
     * de la accion que se realice
     */
    public function __construct()
    {
        $this->serviceTratamiento = new ServiceTipoTratamiento();
        $this->servicePersonal = new ServicePersonal();
        $this->serviceAtencion = new ServiceAtencion();
        $this->serviceAnalisis = new ServiceAnalisis();
    }

    public function  respuesta($result)
    {
        if ($result) {
            return "Accion ejecutada correctamente...!! ";
        } else {
            return "No se logro el registro, corrija los errores por favor";
        }
    }

    public function nuevoTipoTratamiento(Tratamiento $tratamiento)
    {
        $result = $this->serviceTratamiento->nuevoTipoTratamiento($tratamiento);
        return $this->respuesta($result);
    }

    public function editarTipoTratamiento(Tratamiento $tratamiento)
    {
        $result = $this->serviceTratamiento->editarTipoTratamiento($tratamiento);
        return $this->respuesta($result);
    }

    public function eliminarTipoTratamiento($idTipoTratamiento)
    {
        $result = $this->serviceTratamiento->eliminarTipoTratamiento($idTipoTratamiento);
        return $this->respuesta($result);
    }

    public function obtenerTodoLosTiposTratamiento()
    {
        /**solo deuvelve los id y los nombres de los tipos'getIdTipoTratamiento
         * y getIdnombreTipoTratamiento'*/
        $result = $this->serviceTratamiento->obtenerTiposTratamiento();

        if ($result == null) {
            return " Error al obtener los datos, no existen datos ..!";
        } else {
            return $result;
        }
    }

    /**
     * Aqui los obtener sirven para buscar los tipos ....
     */

    public function obtenerTipoTratamiento($idTipoTratamiento)
    {
        /**solo deuvelve todo los datos puedes usarlo para hacer las ediciones'*/
        $result = $this->serviceTratamiento->obtenerTipoTratamiento($idTipoTratamiento);
        if ($result == null) {
            return " Error al obtener los datos, no existen datos ..!";
        } else {
            return $result;
        }

    }

}