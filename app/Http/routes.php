<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cliente/obtenerClientePorId/{id}','ControlCliente@obtenerClientePorId');
Route::get('/cliente/obtenerClientePorNombre/{nombre}','ControlCliente@obtenerClientePorNombre');
Route::get('/cliente/obtenerClientePorDni','ControlCliente@obtenerClientePorDni');
//rout::get('',);
