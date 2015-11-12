<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 6/11/2015
 * Time: 2:22 PM
 */

namespace App\Http\Controllers;

use DB;

class  ServiceEspecie extends Controller

{
    // retorna una lista de Especies

    /**
     * ServiceEspecie constructor.
     */
    public function __construct()
    {
    }

    public function listar()
    {
        $especies = DB::select('select * from especie WHERE Activado = 1');
        return $especies;
    }

    public function obtenerEspecie($idEspecie)
    {
        $especie = DB::table('especie')->where('idEspecie', $idEspecie)->first();
        return $especie;
    }

    public function obtenerEspecieNombre($nombre)
    {
        ;
        $result = DB::table('especie')->where('Nombre', $nombre)->first();

        return $result;

    }

    public function agregarEspecie(Especie $especie)
    {
        $count = DB::table('especie')->max('idEspecie');
        // agregar una especie el la columna activado se refiere si esta eliminado o no.
        DB::table('especie')->insert(
            ['idEspecie' => $count + 1, 'Nombre' => $especie->getNombre(),
                'tipo' => $especie->getTipo()
                , 'Descripcion' => $especie->getDescripcion(),
                'TipoDePiel' => $especie->getTipoDePiel(), 'Activado' => 1]
        );

    }

    public function modificarEspecie($id)
    {
        DB::table('especie')
            ->where('idEspecie', $id)
            ->update(['Activado' => 0]);
    }

    public function  eliminarEspeciePorID($id)
    {
        DB::table('especie')
            ->where('idEspecie', $id)
            ->update(['Activado' => 0]);

    }

    public function  eliminarEspeciePorNombre($nombre)
    {
        DB::table('especie')
            ->where('Nombre', $nombre)
            ->update(['Activado' => 0]);


    }


}