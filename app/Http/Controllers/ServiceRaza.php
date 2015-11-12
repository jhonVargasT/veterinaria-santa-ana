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
        $raza= DB::select('select * from Raza WHERE Activado = 1');
        return $raza;
    }

    public function obtenerRaza($idRaza)
    {
        $raza=DB::table('raza')->where('idRaza',$idEspecie)->first();
        return $raza;
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

    public function modificarRaza(Raza  $raza)
    {

       DB::table('raza')
            ->where('idRaza', $raza->getIdRaza())
            ->update(['Especie_idEspecie'=>$raza->getIdEspecie(),
                'Nombre'=>$raza->getNombreRaza(),
                'EstiloDePelo'=>$raza->getEstiloPiel()]);
    }
    public function  eliminarRazaPorID( $id)
    {
        DB::table('raza')
            ->where('idRaza', $id)
            ->update(['Activado'=>0]);
    }
    public function  eliminarRazaPorNombre( $nombre)
    {
       DB::table('raza')
            ->where('Nombre', $nombre)
            ->update(['Activado'=>0]);

    }

}