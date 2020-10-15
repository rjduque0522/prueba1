<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});



//Rutas de Clientes

$router->get('/clientes', 'clientesController@index');
$router->get('/clientes/{nit_cli}', 'clientesController@getClientes');
$router->get('/clientes/buscar/{nom_cli}', 'clientesController@searchClientes');
$router->post('/clientes', 'clientesController@createClientes');
$router->put('/clientes/{nit_cli}', 'clientesController@updateClientes');
$router->delete('/clientes/{nit_cli}', 'clientesController@destroyClientes');


