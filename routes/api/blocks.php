<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('blocks')->group(function(Router $router) {

        $router->post('list-types', 'BlockController@listTypes');

        $router->post('list', 'BlockController@list');

        $router->post('store', 'BlockController@store');

        $router->post('{block}/show', 'BlockController@show');

        $router->post('{block}/update', 'BlockController@update');

        $router->post('{block}/delete', 'BlockController@delete');

        $router->post('positioning', 'BlockController@positioning');

    });
