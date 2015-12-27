<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 27/12/2015
 * Time: 2:17 PM
 */

namespace App\Http\Controllers;


use App\Atencion\Receta;

class ControlReceta extends Controller
{
    private $serviceReceta;
    private $serviceLog;


    public function __construct()
    {
        $this->serviceReceta=new ServiceReceta();
        $this->serviceLog=new ServiceLog();
    }

    public function nuevaReceta(Receta $receta)
    {
        $result=$this->serviceReceta->nuevaReceta($receta);
        if ($result) {
            $log = new Log();
            $log->setIdAnimal($receta->getIdAnimal());
            $log->setTipoLog('Pesaje');
            $log->setDescripcion(' Pesado con exito');
            $this->serviceLog->nuevoLog($log);

            return 'Atencion creada con exito';
        } else {
            return 'Error al crear atencion, intentelo nuevamente';
        }
    }


}