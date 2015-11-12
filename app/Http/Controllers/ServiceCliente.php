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

    public function __construct()
    {

    }

    public function listar()
    {
        $especies = DB::select('select * from Cliente WHERE Activado = 1');
        return $especies;
    }

    public function listarAnimalesDeCliente($idCliente)
    {
        $especies = DB::select('select * from Animal WHERE Activado = ?', [$idCliente]);
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