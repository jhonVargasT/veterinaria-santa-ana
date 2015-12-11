<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 10/12/2015
 * Time: 5:54 PM
 */

namespace App\Http\Controllers;

use App\Atencion\Protocolo;
use Mockery\CountValidator\Exception;

class ServiceProtocolo extends Controller
{


    /**
     * ServiceProtocolo constructor.
     */
    public function __construct()
    {
    }

    public function nuevoProtocolo(Protocolo $protocolo)
    {
        try {
            DB::table('protocolo')->insert(['IdTipoTratamiento' => $protocolo->getIdTipoTratamiento(),
                'NombreProtocolo' => $protocolo->getNombreProtocolo()
                , 'NroDosis' => $protocolo->getNroDosis()]);
            return true;
        } catch (Exception $e) {
            return false;
        }

    }

    public function editarProtocolo(Protocolo $protocolo)
    {
        try {
            DB::table('protocolo')->where(['IdProtocolo' => $protocolo->getIdProtocolo()])
                ->update(['IdTipoTratamiento' => $protocolo->getIdTipoTratamiento(),
                    'NombreProtocolo' => $protocolo->getNombreProtocolo()
                    , 'NroDosis' => $protocolo->getNroDosis()]);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function eliminarProtocolo($idProtocolo)
    {
        try {
            DB::table('protocolo')->where(['IdProtocolo' => $idProtocolo])
                ->update(['Activado' => 0]);

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function mostrarProtocolos()
    {
        $protocolo = array();
        try {
            $result = DB::table('protocolo')->where(['Activado' => 1])->get();
            for ($i = 0; $i < count($result); $i++) {
                $protocolo[$i] = new TipoTratamiento();
                $protocolo[$i]->setIdProtocolo($result[$i]->IdProtocolo);
                $protocolo[$i]->setIdTipoTratamiento($result[$i]->IdTipoTratamiento);
                $protocolo[$i]->setNombreProtocolo($result[$i]->NombreProtocolo);
                $protocolo[$i]->setNroDosis($result[$i]->NroDosis);

            }

            return $protocolo;
        } catch (\mysqli_sql_exception $e) {
            return null;
        }
    }

    public function obtenerProtocolo($idProtocolo)
    {
        $protocolo = array();
        try {
            $result = DB::table('protocolo')->where(['Activado' => 1])->
            where('IdProtocolo', $idProtocolo)->get();
            for ($i = 0; $i < count($result); $i++) {
                $protocolo[$i] = new TipoTratamiento();
                $protocolo[$i]->setIdProtocolo($result[$i]->IdProtocolo);
                $protocolo[$i]->setIdTipoTratamiento($result[$i]->IdTipoTratamiento);
                $protocolo[$i]->setNombreProtocolo($result[$i]->NombreProtocolo);
                $protocolo[$i]->setNroDosis($result[$i]->NroDosis);

            }

            return $protocolo;
        } catch (\mysqli_sql_exception $e) {
            return null;
        }
    }

    public function obtenerProtocoloPorNombre($nombreProtocolo)
    {

        $protocolo = array();
        try {
            $result = DB::select("SELECT * FROM protocolo where NombreProtocolo LIKE '%$nombreProtocolo%' ");

            for ($i = 0; $i < count($result); $i++) {
                $protocolo[$i] = new TipoTratamiento();
                $protocolo[$i]->setIdProtocolo($result[$i]->IdProtocolo);
                $protocolo[$i]->setIdTipoTratamiento($result[$i]->IdTipoTratamiento);
                $protocolo[$i]->setNombreProtocolo($result[$i]->NombreProtocolo);
                $protocolo[$i]->setNroDosis($result[$i]->NroDosis);

            }

            return $protocolo;
        } catch (\mysqli_sql_exception $e) {
            return null;
        }

    }

}