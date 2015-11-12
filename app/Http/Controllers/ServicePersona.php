<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 6/11/2015
 * Time: 2:22 PM
 */

namespace App\Http\Controllers;

use DB;


class ServicePersona extends Controller
{

    public function __construct()
    {

    }

    //retorna una arreglo
    public function listar()
    {

        $persona = DB::select('select * from persona WHERE Activado = 1');
        Return $persona;
    }

    /*  public function listarAnimalesDeCliente($idCliente)
      {
          $especies = DB::select('select * from persona WHERE Activado = ?', [$idCliente]);
          return $especies;
      }*/

    public function obtenerPersona($idpersona)
    {

        $persona = DB::table('persona')->where('IdPersona', $idpersona)->first();
        $person = new Persona($persona->IdPersona, $persona->Nombre, $persona->Apellido,
            $persona->Sexo, $persona->DocIdent, $persona->FechaNac,
            $persona->Email, $persona->Ciudad, $persona->Direccion, $persona->ReferenciasLocali,
            $persona->TelefFijo, $persona->TelefMovil);
        return $person;
    }

    public function obtenerPersonaNombre($nombre)
    {

        $persona = DB::table('persona')->where('Nombre', $nombre)->first();
        $person = new Persona($persona->IdPersona, $persona->Nombre, $persona->Apellido,
            $persona->Sexo, $persona->DocIdent, $persona->FechaNac,
            $persona->Email, $persona->Ciudad, $persona->Direccion, $persona->ReferenciasLocali,
            $persona->TelefFijo, $persona->TelefMovil);
        return $person;
    }

    public function agregarPersona(Persona $persona)
    {
        $count = DB::table('persona')->max('IdPersona');
        $count;
        // agregar una especie la columna activado es para eliminar(no se elimina el registro solo
        //cambia su estado)
        DB::table('persona')->insert(
            ['IdPersona' => $count + 1, 'DocIdent' => $persona->getDocuIdent(),
                'Nombre' => $persona->getNombre(), 'Apellido' => $persona->getApellido(),
                'Sexo' => $persona->getSexo(), 'FechaNac' => $persona->getFechaNacimiento(),
                'Email' => $persona->getEmail(), 'Ciudad' => $persona->getCiudad(),
                'Direccion' => $persona->getDireccion(), 'ReferenciaLocali' => $persona->getReferenciasLocali()
                , 'TeleFijo' => $persona->getTelefonoFijo(), 'TelefMovil' => $persona->getTelefonoMovil(),
                'Activado' => 1
            ]
        );

    }

    public function modificarAnimal(Persona $persona)
    {
        DB::table('persona')
            ->where('IdPersona', $persona->getIdPersona())
            ->update(['DocIdent' => $persona->getDocuIdent(),
                'Nombre' => $persona->getNombre(), 'Apellido' => $persona->getApellido(),
                'Sexo' => $persona->getSexo(), 'FechaNac' => $persona->getFechaNacimiento(),
                'Email' => $persona->getEmail(), 'Ciudad' => $persona->getCiudad(),
                'Direccion' => $persona->getDireccion(), 'ReferenciaLocali' => $persona->getReferenciasLocali()
                , 'TeleFijo' => $persona->getTelefonoFijo(), 'TelefMovil' => $persona->getTelefonoMovil()]);
    }

    public function  eliminarAnimalPorID($id)
    {
        DB::table('persona')
            ->where('IdPersona', $id)
            ->update(['Activado' => 0]);
    }


}