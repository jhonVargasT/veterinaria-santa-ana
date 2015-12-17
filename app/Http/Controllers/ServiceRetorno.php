<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 14/12/2015
 * Time: 4:01 PM
 */

namespace App\Http\Controllers;

use DB;
use App\Atencion\Retorno;

class ServiceRetorno extends Controller
{
    public function __construct()
    {
    }

    public function nuevoRetorno(Retorno $retorno)
    {
        try {

            DB::table('retorno')
                ->insert(['FechaRetorno' =>
                    $retorno->getFechaRetorno(),
                    'HoraRetorno' => $retorno->getHoraRetorno(),
                    'ObservacionRetorno' => $retorno->getObservacion()
                    , 'IdAtencion' => $retorno->getIdAtencion()]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function  editarRetorno(Retorno $retorno)
    {
        try {

            DB::table('retorno')->where(['IdRetorno' =>
                $retorno->getIdRetorno()])
                ->update(['FechaRetorno' => $retorno->getFechaRetorno(),
                    'HoraRetorno' => $retorno->getHoraRetorno(),
                    'ObservacionRetorno' => $retorno->getObservacion()
                    , 'IdAtencion' => $retorno->getIdAtencion()]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function eliminarRetorno($idRetorno)
    {
        try {

            DB::table('retorno')->where(['IdRetorno' =>$idRetorno])
                ->update(['Activado'=>0]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function obtenerRetornos()
    {
        $retorno=array();
        try {
            $result=DB::table('retorno')->where(['Activado'=>1])->get();
            for($i=0;$i<count($result);$i++)
            {
                $retorno[$i]=new Retorno();
                $retorno[$i]->setIdRetorno($retorno[$i]->IdRetorno);
                $retorno[$i]->setFechaRetorno($retorno[$i]->FechaRetorno);
                $retorno[$i]->setHoraRetorno($retorno[$i]->HoraRetorno);
                $retorno[$i]->setObservacion($retorno[$i]->ObservacionRetorno);
                $retorno[$i]->setIdAtencion($retorno[$i]->IdAtencion);
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    public function obetnerRetornoAtencion($idAtencion)
    {
        try {
            $result=DB::table('retorno')->where(['Activado'=>1])
                ->where(['IdAtencion'=>$idAtencion])->get();

                $retorno=new Retorno();
                $retorno->setIdRetorno($retorno->IdRetorno);
                $retorno->setFechaRetorno($retorno->FechaRetorno);
                $retorno->setHoraRetorno($retorno->HoraRetorno);
                $retorno->setObservacion($retorno->ObservacionRetorno);
                $retorno->setIdAtencion($retorno->IdAtencion);

        } catch (\Exception $e) {
            return false;
        }
    }


}