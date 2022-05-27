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

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});

$router->get('/', ['uses' => 'MainController@main']);

$router->post('links', ['uses' => 'ApiController@create']);
$router->get('links', ['uses' => 'ApiController@getAll']);
$router->get('links/{id}', ['uses' => 'ApiController@getOne']);
$router->put('links/{id}', ['uses' => 'ApiController@update']);
$router->delete('links/{id}', ['uses' => 'ApiController@delete']);

$router->get('stats', ['uses' => 'StatController@getAll']);
$router->get('stats/{id}', ['uses' => 'StatController@getOne']);

$router->get('/{link:[A-Za-z0-9]+}', ['uses' => 'MainController@redirect']);
