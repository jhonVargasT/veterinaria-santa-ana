<?php

/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 5/12/2015
 * Time: 3:20 PM
 */
namespace App\Http\Controllers;

use App\Atencion\Patologia;
use Mockery\Exception;
use DB;

class ServicePatologia extends Controller
{

    public function __construct()
    {

    }

    /*Los metodos estan implementados para que devuelvan verdadero o falso
    segun se ejecuten en la base de datos(0 o 1)*/
    public function agregarPatologia(Patologia $patologia)
    {
        try {
            DB::table('patologia')->insert(['NombrePatologia' => $patologia->getNombrePatologia()
                , 'DescripcionPatologia' => $patologia->getDesripcionPatologia()]);
            return true;
        } catch (
        Exception $e
        ) {
            return false;
        }

    }

    public function editarPatologia(Patologia $patologia)
    {
        try {
            DB::table('patologia')->where(['IdPatologia' => $patologia->getIdPatologia()])
                ->update(['NombrePatologia' => $patologia->getNombrePatologia(),
                    'DescripcionPatologia' => $patologia->getDesripcionPatologia()
                ]);
            return true;
        } catch (Exception $e) {
            return false;
        }


    }

    public function eliminarPatologia($idPatologia)
    {
        try {
            DB::table('patologia')->where(['IdPatologia' => $idPatologia])->update([
                'Activado' => 0]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * @param $idPatologia
     * @return bool
     */
    public function obtenerPatologias()
    {
       $patologia=array();
        try {
            $result= DB::select('select IdPatologia,NombrePatologia from Patologia
                      WHERE Activado = 1');

            for($i=0;$i<count($result);$i++){
                $patologia[$i]=new Patologia();
                $patologia[$i]->setIdPatologia($result[$i]->IdPatologia);
                $patologia[$i]->setNombrePatologia($result[$i]->NombrePatologia);
            }

            return $patologia;
        } catch (Exception $e) {
            return null;
        }
    }

    public function buscarPatologiaPorNombre()
    {
        $patologia=array();
        try {
            $result= DB::select('SELECT * FROM bd_vsa.patologia where NombrePatologia LIKE \'%fie%\'');

            for($i=0;$i<count($result);$i++){
                $patologia[$i]=new Patologia();
                $patologia[$i]->setIdPatologia($result[$i]->IdPatologia);
                $patologia[$i]->setNombrePatologia($result[$i]->NombrePatologia);
            }

            For ($i;$i<count($result);$i++)
            {
                echo $patologia[i]->getIdPatologia();
            }
        } catch (Exception $e) {
            return null;
        }
    }

}