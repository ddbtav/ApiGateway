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

   $router->group(['middleware' => 'client.credentials'], function () use ($router) {

// $router->group([], function () use ($router) {

    /**
     * Routes for webservers
     */
    $router->get('/webservers', 'WebserverController@index');
    $router->post('/webservers', 'WebserverController@store');
    $router->get('/webservers/{webserver}', 'WebserverController@show');
    $router->put('/webservers/{webserver}', 'WebserverController@update');
    $router->patch('/webservers/{webserver}', 'WebserverController@update');
    $router->delete('/webservers/{webserver}', 'WebserverController@destroy');

});