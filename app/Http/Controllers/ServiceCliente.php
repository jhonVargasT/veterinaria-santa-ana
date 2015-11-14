<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 6/11/2015
 * Time: 2:22 PM
 */

namespace App\Http\Controllers;

use DB;

class ServiceCliente extends controller
{
    private $servicePersona;

    public function __construct()
    {
        $this->servicePersona = new ServicePersona();
    }

    public function listarClientes()
    {

        $clientes = DB::select('select * from cliente WHERE Activado = 1');
        $persona = $this->servicePersona->obtenerPersona(2);
        $persona->getIdPersona();
        for ($i = 0; $i < count($clientes); $i++) {
            $persona = $this->servicePersona->obtenerPersona(2);
            $cliente[$i] = new Cliente($clientes[$i]->idCliente, $clientes[$i]->FechaAfiliacion,
                $clientes[$i]->ComoConoce, $clientes[$i]->Foto, $clientes[$i]->Persona_IdPersona,
                $persona->getNombre(), $persona->getApellido(), $persona->getSexo(),
                $persona->getDocuIdent(), $persona->getFechaNacimiento(), $persona->getEmail()
                , $persona->getCiudad(), $persona->getDireccion(), $persona->getReferenciasLocali(),
                $persona->getTelefonoMovil(), $persona->getTelefonoFijo());
        }

        return $cliente;
    }


    public function obtenerCliente($idCliente)
    {

        $clientes = DB::table('cliente')->where('idCliente', $idCliente)->first();
        $persona = $this->servicePersona->obtenerPersona($clientes->idCliente);
        $cliente = new Cliente($clientes->idCliente, $clientes->FechaAfiliacion,
            $clientes->ComoConoce, $clientes->Foto, $clientes->Persona_IdPersona,
            $persona->getNombre(), $persona->getApellido(), $persona->getSexo(),
            $persona->getDocuIdent(), $persona->getFechaNacimiento(), $persona->getEmail()
            , $persona->getCiudad(), $persona->getDireccion(), $persona->getReferenciasLocali(),
            $persona->getTelefonoMovil(), $persona->getTelefonoFijo());
        return $cliente;
    }

    public function obtenerClientePorNombre($nombre)
    {

        $clientes = DB::table('cliente')->where('Nombre', $nombre)->first();
        $persona = $this->servicePersona->obtenerPersona($clientes->idCliente);
        $cliente = new Cliente($clientes->idCliente, $clientes->FechaAfiliacion,
            $clientes->ComoConoce, $clientes->Foto, $clientes->Persona_IdPersona,
            $persona->getNombre(), $persona->getApellido(), $persona->getSexo(),
            $persona->getDocuIdent(), $persona->getFechaNacimiento(), $persona->getEmail()
            , $persona->getCiudad(), $persona->getDireccion(), $persona->getReferenciasLocali(),
            $persona->getTelefonoMovil(), $persona->getTelefonoFijo());
        return $cliente;

    }

    public function agregarCliente(Animal $animal)
    {
        $count = DB::table('animal')->max('idAnimal');
        $count;

        DB::table('animal')->insert(
            ['idAnimal' => $count + 1, 'Codigo' => $animal->getCodigo(),
                'Nombre' => $animal->getNombre(), 'Sexo' => $animal->getSexo(),
                'Esterilizacion' => $animal->getEsterilizacion(), 'FechaDeNacimiento' => $animal
                ->getFechaNacimiento(), 'Estado' => $animal->getEstado(),
                'Observacion' => $animal->getObservacion(), 'Color' => $animal->getColor()
                , 'Pedigree' => $animal->getPedigree(), 'NumPedigree' => $animal->getNumPedigree(),
                'Cliente_idCliente' => $animal->getIdCliente(), 'Raza_idRaza' => $animal->getIdraza(),
                'Activado' => 1
            ]
        );

    }

    public function modificarAnimal(Animal $animal)
    {
        DB::table('animal')
            ->where('idAnimal', $animal->getIdAnimal())
            ->update(['Codigo' => $animal->getCodigo(),
                'Nombre' => $animal->getNombre(), 'Sexo' => $animal->getSexo(),
                'Esterilizacion' => $animal->getEsterilizacion(), 'FechaDeNacimiento' => $animal
                    ->getFechaNacimiento(), 'Estado' => $animal->getEstado(),
                'Observacion' => $animal->getObservacion(), 'Color' => $animal->getColor()
                , 'Pedigree' => $animal->getPedigree(), 'NumPedigree' => $animal->getNumPedigree(),
                'Cliente_idCliente' => $animal->getIdCliente(), 'Raza_idRaza' => $animal->getIdraza()]);
    }

    public function  eliminarAnimalPorID($id)
    {
        DB::table('animal')
            ->where('idAnimal', $id)
            ->update(['Activado' => 0]);
    }

    public function  eliminarEspeciePorNombre($nombre)
    {
        DB::table('animal')
            ->where('Nombre', $nombre)
            ->update(['Activado' => 0]);

    }
}