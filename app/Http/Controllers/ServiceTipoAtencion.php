<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 14/12/2015
 * Time: 3:04 PM
 */

namespace App\Http\Controllers;


use App\Atencion\TipoAtencion;
use DD;
class ServiceTipoAtencion
{
    /**
     * ServiceTipoPersonal constructor.
     */
    public function __construct()
    {
    }

    public function nuevoTipoAtencion(TipoAtencion $tipoAtencion)
    {
        try {
            DB::table('tipoatencion')
                ->insert([
                    'NombreTipoAtencion' => $tipoAtencion->getNombre(),
                    'DescripcionTipoAtencion' => $tipoAtencion->getDescripcion()
                ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function editarTipoAtencion(TipoAtencion $tipoAtencion)
    {
        try {
            DB::table('tipoatencion')
                ->where('IdTipoAtencion', $tipoAtencion->getIdTipoAtencion())
                ->update([
                    'NombreTipoAtencion' => $tipoAtencion->getNombre(),
                    'DescripcionTipoAtencion' => $tipoAtencion->getDescripcion()
                ]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function eliminarTipoAtencionl($idTipoAtencion)
    {
        try {
            DB::table('tipoatencion')->where('IdTipoAtencion', $idTipoAtencion)
                ->update(['Activado' => 0]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function mostrarTipoAtencion()
    {
        $tipoAtencion = array();
        try {
            $result = DB::table('tipoatencion')->
            where(['Activado' => 0])
                ->get();
            for ($i = 0; $i < count($result); $i++) {
                $tipoAtencion[$i] = new TipoAtencion();
                $tipoAtencion[$i]->setIdTipoAtencion($result[$i]->IdTipoAtencion);
                $tipoAtencion[$i]->setNombre($result[$i]->NombreTipoAtencion);
            }
            return $tipoAtencion;
        } catch (Exception $e) {
            return false;
        }
    }
    // muestra la atencion buscado por el tipo

    public function  mostrarTipoAtencionid($idTipoPersonal)
    {
        try {
            $result = DB::table('tipopersonal')
                ->where(['IdTipoPersonal' => $idTipoPersonal])
                ->where(['Activado' => 0])
                ->first();
            $tipoAtencion = new TipoAtencion();
            $tipoAtencion->setIdTipoAtencion($result->IdTipoAtencion);
            $tipoAtencion->setNombre($result->NombreTipoAtencion);
            $tipoAtencion->setDescripcion($result->DescripcionTipoAtencion);

            return $tipoAtencion;
        } catch (Exception $e) {
        }
    }
}