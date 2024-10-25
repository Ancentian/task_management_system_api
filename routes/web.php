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

$router->get('tasks', 'TaskController@index');          // Get all tasks
$router->get('tasks/{id}', 'TaskController@show');      // Get a specific task
$router->post('store', 'TaskController@store');         // Create a new task
$router->put('update-task/{id}', 'TaskController@update');    // Update a task
$router->delete('delete-task/{id}', 'TaskController@destroy'); // Delete a task

