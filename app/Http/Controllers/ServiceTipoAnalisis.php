<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 9/12/2015
 * Time: 12:37 AM
 */

namespace App\Http\Controllers;

use DB;
use App\Atencion\TipoAnalisis;

class ServiceTipoAnalisis extends controller
{


    /**
     * ServiceTipoAnalisis constructor.
     */
    public function __construct()
    {
    }

    public function nuevoTipoAnalisis(TipoAnalisis $tipoAnalisis)
    {
        try {
            DB::table('TipoAnalisis')
                ->insert(['NombreTipoAnalisis' => $tipoAnalisis->getIdTipoAnalisis(),
                    'Descripcion' => $tipoAnalisis->getIdTipoAnalisis()]);
            return true;
        } catch (mysqli_sql_exception $e) {
            return false;
        }

    }

    public function editarTipoAnalisis()
    {

        try {

        } catch (mysqli_sql_exception $e) {
            return false;
        }
    }
}