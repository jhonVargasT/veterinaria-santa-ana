<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 8/12/2015
 * Time: 3:46 PM
 */

namespace App\Http\Controllers;

use App\Atencion\Documento;

use DB;

class ServiceDocumento
{


    /**
     * ServiceDocumento constructor.
     */
    public function __construct()
    {
    }

    public function nuevoDocumento(Documento $documento)
    {
        try {
            DB::table('documento')->insert(['TipoDeDocumento' => $documento->getTipoDocumento(),
                'UbicacionDocumento' => $documento->getUbicacionDocunemto(),
                'IdAnimal' => $documento->getIdAnimal(), 'IdPersonal' => $documento->getIdPersonal()]);
            return true;
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public function editarDocumento(Documento $documento)
    {
        try {
            DB::table('documento')->
            where(['IdDocumento' => $documento->getIdDocumento()])
                ->update(['TipoDeDocumento' => $documento->getTipoDocumento(),
                    'UbicacionDocumento' => $documento->getUbicacionDocunemto(),
                    'IdAnimal' => $documento->getIdAnimal(),
                    'IdPersonal' => $documento->getIdPersonal()]);
            return true;
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public function eliminarDocumento($idDocumento)
    {
        try {
            DB::table('documento')->where(['IdDocumento' => $idDocumento])
                ->update(['Activado' => 0]);
            return true;
        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }

    public function obtenerDocumentos($idAnimal)
    {
        $documento=array();
        try {
            $result=DB::table('documento')->get();

            for($i=0;$i<count($result);$i++){

                $documento[$i]=new Documento();

            }

        } catch (mysqli_sql_exception $e) {
            return null;
        }
    }
}