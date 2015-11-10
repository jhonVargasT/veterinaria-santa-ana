<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 6/11/2015
 * Time: 2:22 PM
 */

namespace App\Http\Controllers;




class ServiceRaza extends Controller
{

    public function __construct()
    {
    }

    public function listar()
    {
        $especies= DB::select('select * from Raza WHERE Activado = 1');
        return $especies;
    }

    public function obtenerRaza($idEspecie)
    {
        $especie=DB::table('raza')->where('idRaza',$idEspecie)->first();
        return $especie;
    }

    public function obtenerRazaNombre($nombre)
    {
        ;
        $result=DB::table('raza')->where('Nombre',$nombre)->first();
        //  Especie $especie=new Especie());
        return $result;

    }

    public function agregarRaza(Raza  $raza)
    {
        $count = DB::table('raza')->max('idRaza');
        $count;
        // agregar una especie la columna activado es para eliminar(no se elimina el registro solo
        //cambia su estado)
        DB::table('raza')->insert(
            ['idRaza' =>$count+1,'Especie_idEspecie'=>$raza->getIdEspecie(),
                'Nombre'=>$raza->getNombreRaza(),
                'EstiloDePelo'=>$raza->getEstiloPiel(),'Activado'=>1
            ]
        );

    }

    public function modificarRaza($id)
    {

       DB::table('raza')
            ->where('idRaza', $id)
            ->update(['Activado'=>0]);
    }
    public function  eliminarEspeciePorID( $id)
    {
        DB::table('raza')
            ->where('idRaza', $id)
            ->update(['Activado'=>0]);
    }
    public function  eliminarEspeciePorNombre( $nombre)
    {
       DB::table('raza')
            ->where('Nombre', $nombre)
            ->update(['Activado'=>0]);

    }

}