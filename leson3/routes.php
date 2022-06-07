<?php

// Faz o "import" das classes usadas
// durante o registro das rotas.
// A classe Router é a responsável por registrar uma rota.

use App\Controllers\TasksController;
use App\Core\Router;

Router::get('/',[TasksController::class, 'index']);

Router::post('/tasks','TasksController@store');

Router::get('/users','UsersController@index');

Router::delete('/','TasksController@destroy');

Router::delete('/completed', 'TasksController@destroyCompleted');

Router::put('/', 'TasksController@update');