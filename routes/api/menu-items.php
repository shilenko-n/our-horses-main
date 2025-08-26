<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('menu-items')->group(function(Router $router) {

	$router->post('list/{parent?}', 'MenuItemController@list');

	$router->post('store', 'MenuItemController@store');

	$router->post('{menuItem}/show', 'MenuItemController@show');

	$router->post('{menuItem}/update', 'MenuItemController@update');

	$router->post('{menuItem}/delete', 'MenuItemController@delete');

	$router->post('positioning', 'MenuItemController@positioning');

});
