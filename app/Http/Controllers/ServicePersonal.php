<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 11/12/2015
 * Time: 8:00 PM
 */

namespace App\Http\Controllers;
use DB;
use App\Atencion\Personal;

class ServicePersonal extends Controller
{
    public function __construct()
    {
    }

    public function nuevoPersonal(Personal $personal1)
    {
        try {

            $personal=$personal1;
          DB::transaction(function() use ($personal)
          {
              DB::table('persona')->insert(
                  ['DocIdent' => $personal->getDocuIdent(),
                      'Nombre' => $personal->getNombre(), 'Apellido' => $personal->getApellido(),
                      'Sexo' => $personal->getSexo(), 'FechaNac' => $personal->getFechaNacimiento(),
                      'Email' => $personal->getEmail(), 'Ciudad' => $personal->getCiudad(),
                      'Direccion' => $personal->getDireccion(), 'ReferenciasLocali' => $personal->getReferenciasLocali()
                      , 'TelefFijo' => $personal->getTelefonoFijo(), 'TelefMovil' => $personal->getTelefonoMovil(),
                      'Activado' => 1]);

/*
              DB::table('personal')->insert(['Privilegios' => $personal->getPrivilegios(),
                  'UsuarioPersonal' => $personal->getUsuarioPersonal(),
                  'PaswoordPersonal' => $personal->getPaswoordPersonal(),
                  'IdPersona' => $personal->getIdPersona(),
                  'IdTipoPersonal' => $personal->getIdTipoPersonal()]);*/

          }

            );

                return true;

} catch (\Exception $e) {
            return false;
        }
    }

    public function editarPersonal(Personal $personal)
    {
        try {
            DB::transaction(function() use ($personal){
            DB::table('personal')->where('IdPersonal', $personal->getIdPersonal())
                ->insert(['Privilegios' => $personal->getIdPersonal(),
                    'UsuarioPersonal' => $personal->getUsuarioPersonal(),
                    'PaswoordPersonal' => $personal->getPaswoordPersonal(),
                    'IdPersona' => $personal->getIdPersonal(),
                    'IdTipoPersonal' => $personal->getIdTipoPersonal()]);
                DB::table('persona')
                    ->where('IdPersona', $personal->getIdPersona())
                    ->update(['DocIdent' => $personal->getDocuIdent(),
                        'Nombre' => $personal->getNombre(), 'Apellido' => $personal->getApellido(),
                        'Sexo' => $personal->getSexo(), 'FechaNac' => $personal->getFechaNacimiento(),
                        'Email' => $personal->getEmail(), 'Ciudad' => $personal->getCiudad(),
                        'Direccion' => $personal->getDireccion(), 'ReferenciasLocali' => $personal->getReferenciasLocali()
                        , 'TelefFijo' => $personal->getTelefonoFijo(), 'TelefMovil' => $personal->getTelefonoMovil()]);
            });
        } catch (\Exception $e) {
        }
    }

    public function eliminarPersonal($idPersonal)
    {
        try {
            DB::table('personal')
                ->where('IdPersonal', $idPersonal)
                ->insert(['Activado' => 0]);
        } catch (\Exception $e) {
        }
    }

    public function mostrarPersonal($idPersonal)
    {
        $personal = array();
        try {
            $result = DB::table('personal')->where('IdPersonal', $idPersonal)->get();

            $personal = new Personal();
            $personal->setIdTipoPersonal($result->IdPersonal);
            $personal->setPrivilegios($result->Privilegios);
            $personal->setUsuarioPersonal($result->UsuarioPersonal);
            $personal->setPaswoordPersonal($result->PaswoordPersonal);
            $personal->setIdPersona($result->IdPersona);

            return $personal;

        } catch (\Exception $e) {
        }
    }

    public function mostrarPersonales()
    {
        try {
            $personal = array();
            try {
                $result = DB::table('personal')->get();

                for ($i = 0; $i < count($result); $i++){

                $personal[$i] = new Personal();
                $personal[$i]->setIdTipoPersonal($result[$i]->IdPersonal);
                $personal[$i]->setPrivilegios($result[$i]->Privilegios);
                $personal[$i]->setUsuarioPersonal($result[$i]->UsuarioPersonal);
                $personal[$i]->setPaswoordPersonal($result[$i]->PaswoordPersonal);
                $personal[$i]->setIdPersona($result[$i]->IdPersona);
            }
                return $personal;

            } catch (\Exception $e) {
            }
        } catch (\Exception $e) {
        }
    }
}