<?php

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
//LOGIN

$router->post('auth/login', 'AuthController@autenticate');

$router->get('/teste', 'ExampleController@teste');
$router->get('/lista-usuarios', 'APIControler@ListaUsuarios');

$router->get('/clientes', 'APIControler@ListaClientes');
$router->get('/clientes/{id}', 'APIControler@ListaCliente');
$router->post('/clientes', 'APIControler@CadastraCliente');
$router->Delete('/clientes/{id}', 'APIControler@DeleteCliente');
$router->put('/clientes', 'APIControler@AlteraCliente');