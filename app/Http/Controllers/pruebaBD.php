<?php
/**
 * Created by PhpStorm.
 * User: JhonVargasN72V
 * Date: 8/11/2015
 * Time: 1:24 PM
 */

namespace App\Http\Controllers;
use App\Http\Controllers;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades;

class pruebaBD extends Controller
{
   public function listar()
   {
       $especies= DB::select('select * from especie');
       foreach($especies as $especie){
       echo $especie->Nombre . $especie->Tipo. $especie->Descripcion; }
   }
    public function obtenerEspecie($id)
    {

       $especie=DB::table('especie')->where('idEspecie',$id)->first();
        return $especie->Nombre;
    }



public function TestDatabaseConnection(){

    $response = new Response();
    try {
        $database_host = config::get('database.connections.mysql.host');
        $database_name = config::get('database.connections.mysql.database');
        $database_user = config::get('database.connections.mysql.username');
        $database_password = config::get("database.connections.mysql.password");

        $connection = mysqli_connect($database_host,$database_user,$database_password,$database_name);

        $errno = mysqli_connect_errno();

        $configData = config('database.connections.mysql.host');
        if (mysqli_connect_errno()){
            $response->setContent("SIHAY ERROR");
        } else {
            $response->setContent("NO HAY ERRROR SOY UN BURRO$configData - $database_name - $database_user - $database_host");
        }

    } catch (Exception $e) {

        $response->setContent(" ERROR". $e->getMessage());

    }

    return $response;
}
}