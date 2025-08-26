<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('contacts')->group(function(Router $router) {

	$router->post('list', 'ContactContoller@list');

	$router->post('store', 'ContactContoller@store');

	$router->post('{contact}/show', 'ContactContoller@show');

	$router->post('{contact}/update', 'ContactContoller@update');

	$router->post('{contact}/delete', 'ContactContoller@delete');

	$router->post('positioning', 'ContactContoller@positioning');

});
