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

    public function listarClientes()
    {

        $clientes = DB::select('select * from cliente WHERE Activado = 1');
       // $persona = $this->servicePersona->obtenerPersona(2);
        // $persona->getIdPersona();
        for ($i = 0; $i < count($clientes); $i++) {

            $persona = $this->servicePersona->obtenerPersona($i+1);
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

    public function agregarCliente(Cliente $cliente)
    {
        $count = DB::table('cliente')->max('idCliente');
        $count;
        $cliente->setIdPersona($count);
        $this->servicePersona->agregarPersona(new Persona($cliente->getIdPersona(), $cliente->getNombre(), $cliente->getApellido(),
            $cliente->getSexo(), $cliente->getDocuIdent(), $cliente->getFechaNacimiento(), $cliente->getEmail(), $cliente->getCiudad(),
            $cliente->getDireccion(), $cliente->getReferenciasLocali(), $cliente->getTelefonoFijo(), $cliente->getTelefonoMovil()));

        DB::table('cliente')->insert(['idCliente' => $count, 'FechaAfiliacion' => $cliente->getFechaDeAfiliacion(),
                'ComoConoce' => $cliente->getComoConoce(), 'Foto' => $cliente->getFoto(),
                'Persona_IdPersona' => $cliente->getIdPersona(), 'Activado' => 1]
        );

    }

    public function modificarCliente(Cliente $cliente)
    {
        $this->servicePersona->modificarPersona(new Persona($cliente->getIdPersona(),
            $cliente->getNombre(), $cliente->getApellido(),
            $cliente->getSexo(), $cliente->getDocuIdent(), $cliente->getFechaNacimiento(),
            $cliente->getEmail(), $cliente->getCiudad(),
            $cliente->getDireccion(), $cliente->getReferenciasLocali(), $cliente->getTelefonoFijo(),
            $cliente->getTelefonoMovil()));
        DB::table('cliente')
            ->where('idCliente', $cliente->getIdCliente())
            ->update(['FechaAfiliacion' => $cliente->getFechaDeAfiliacion(),
                'ComoConoce' => $cliente->getComoConoce(), 'Foto' => $cliente->getFoto(),
                'Persona_IdPersona' => $cliente->getIdPersona()]);
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
}