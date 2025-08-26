<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('users')->group(function(Router $router) {

	$router->post('list', 'UserContoller@list');

	$router->post('{user}/show', 'UserContoller@show');

	$router->post('current', 'UserContoller@current');

	$router->post('{user}/update', 'UserContoller@update');

});
