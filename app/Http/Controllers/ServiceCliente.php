<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 6/11/2015
 * Time: 2:22 PM
 */

namespace App\Http\Controllers;


class ServiceCliente extends controller
{
     private $servicePersona;
    public function __construct()
    {
        $this->servicePersona= new ServicePersona();
    }

    public function listarClientes()
    {

        $clientes = DB::select('select * from cliente WHERE Activado = 1');
        for($i=0;$i<count($clientes);$i++)
            {
                $persona=$this->servicePersona->obtenerPersona($clientes[$i]->Persona_IdPersona);
                $cliente[$i]=new Cliente($clientes[$i]->idCliente,$clientes[$i]->FechaAfiliacion,
                    $clientes[$i]->ComoConoce,$clientes[$i]->Foto,$clientes[$i]->Persona_IdPersona,
                    $persona->getNombre(),$persona->getApellido(),$persona->getSexo(),
                    $persona->getDocuIdent(),$persona->getFechaNacimiento(),$persona->getEmail()
                    ,$persona->getCiudad(),$persona->getDireccion(),$persona->getReferenciasLocali(),
                    $persona->getTelefonoMovil(),$persona->getTelefonoFijo());

            }
        return $cliente;

    }

    public function listarAnimalesDeCliente($idCliente)
    {
        $especies = DB::select('select * from cliente WHERE Activado = ?', [$idCliente]);
        return $especies;
    }

    public function obtenerAnimal($idAnimal)
    {
        $animal = DB::table('animal')->where('idAnimal', $idAnimal)->first();
        return $animal;
    }

    public function obtenerAnimalNombre($nombre)
    {
        ;
        $result = DB::table('animal')->where('Nombre', $nombre)->first();
        //  Especie $especie=new Especie());
        return $result;

    }

    public function agregarAnimal(Animal $animal)
    {
        $count = DB::table('animal')->max('idAnimal');
        $count;
        // agregar una especie la columna activado es para eliminar(no se elimina el registro solo
        //cambia su estado)
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