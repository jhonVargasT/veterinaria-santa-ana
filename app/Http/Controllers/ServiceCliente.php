<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 6/11/2015
 * Time: 2:22 PM
 */

namespace App\Http\Controllers;

use DB;
use App\Cliente;
Use App\Persona;

class ServiceCliente extends controller
{
    private $servicePersona;

    public function __construct()
    {
        $this->servicePersona = new ServicePersona();
    }
    public function agregarCliente(Cliente $cliente)
    {
        echo $cliente->getFoto();
        try {
            DB::transaction(function () use ($cliente) {
                DB::table('persona')
                    ->insert(
                        ['DocIdent' => $cliente->getDocuIdent(),
                            'Nombre' => $cliente->getNombre(),
                            'Apellido' => $cliente->getApellido(),
                            'Sexo' => $cliente->getSexo(),
                            'FechaNac' => $cliente->getFechaNacimiento(),
                            'Email' => $cliente->getEmail(),
                            'Ciudad' => $cliente->getCiudad(),
                            'Direccion' => $cliente->getDireccion(),
                            'ReferenciasLocali' => $cliente->getReferenciasLocali(),
                            'TelefFijo' => $cliente->getTelefonoFijo(),
                            'TelefMovil' => $cliente->getTelefonoMovil(),
                            'Activado' => 1]);

                $id = DB::table('persona')
                    ->max('IdPersona');

                DB::table('cliente')
                    ->insert(['FechaAfiliacion' => $cliente->getFechaDeAfiliacion(),
                        'ComoConoce' => $cliente->getComoConoce(),
                        'Foto' => $cliente->getFoto(),
                        'Persona_IdPersona' => $id]);
            }

            );
            return true;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function modificarCliente(Cliente $cliente)
    {
        try {
            DB::transaction(function () use ($cliente) {
                DB::table('persona')->where(['IdPersona' => $cliente->getIdPersona()])
                    ->update(
                        ['DocIdent' => $cliente->getDocuIdent(),
                            'Nombre' => $cliente->getNombre(),
                            'Apellido' => $cliente->getApellido(),
                            'Sexo' => $cliente->getSexo(),
                            'FechaNac' => $cliente->getFechaNacimiento(),
                            'Email' => $cliente->getEmail(),
                            'Ciudad' => $cliente->getCiudad(),
                            'Direccion' => $cliente->getDireccion(),
                            'ReferenciasLocali' => $cliente->getReferenciasLocali(),
                            'TelefFijo' => $cliente->getTelefonoFijo(),
                            'TelefMovil' => $cliente->getTelefonoMovil()]);

                DB::table('cliente')
                    ->where(['Persona_IdPersona' => $cliente->getIdPersona()])
                    ->update(['FechaAfiliacion' => $cliente->getFechaDeAfiliacion(),
                        'ComoConoce' => $cliente->getComoConoce(),
                        'Foto' => $cliente->getFoto()]);
            }

            );
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function  eliminarClientePorID($id)
    {
        $this->servicePersona->eliminarPersonaPorID($id);
        DB::table('cliente')
            ->where('idCliente', $id)
            ->update(['Activado' => 0]);
    }

    public function  eliminarClientePorNombre($nombre)
    {
        $persona = $this->obtenerClientePorNombre($nombre);

        DB::table('cliente')
            ->where('idCliente', $persona->getIdPersona())
            ->update(['Activado' => 0]);

    }
    public function listarClientes()
    {
        $cliente = array();
        $clientes = DB::select('select * from cliente WHERE Activado = 1');
        for ($i = 0; $i < count($clientes); $i++) {

            $persona = $this->servicePersona->obtenerPersona($i);
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
        $personas = $this->servicePersona->obtenerPersonaNombre($nombre);
        $clientes = DB::table('cliente')->where('idCliente', $personas->getIdPersona())->first();
        $cliente = new Cliente($clientes->idCliente, $clientes->FechaAfiliacion,
            $clientes->ComoConoce, $clientes->Foto, $clientes->Persona_IdPersona,
            $personas->getNombre(), $personas->getApellido(), $personas->getSexo(),
            $personas->getDocuIdent(), $personas->getFechaNacimiento(), $personas->getEmail()
            , $personas->getCiudad(), $personas->getDireccion(), $personas->getReferenciasLocali(),
            $personas->getTelefonoMovil(), $personas->getTelefonoFijo());
        return $cliente;

    }

    public function obtenerClientePorDNI($docIdentidad)
    {
        $personas = $this->servicePersona->obtenerPersonaDocIdent($docIdentidad);
        $clientes = DB::table('cliente')->where('idCliente', $personas->getIdPersona())->first();
        $cliente = new Cliente($clientes->idCliente, $clientes->FechaAfiliacion,
            $clientes->ComoConoce, $clientes->Foto, $clientes->Persona_IdPersona,
            $personas->getNombre(), $personas->getApellido(), $personas->getSexo(),
            $personas->getDocuIdent(), $personas->getFechaNacimiento(), $personas->getEmail()
            , $personas->getCiudad(), $personas->getDireccion(), $personas->getReferenciasLocali(),
            $personas->getTelefonoMovil(), $personas->getTelefonoFijo());
        return $cliente;

    }


}