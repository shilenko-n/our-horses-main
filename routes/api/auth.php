<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::post('get-token', 'AuthController@getToken')->name('api.auth.get-token');

Route::middleware('auth:sanctum')->group(function(Router $router) {

	$router->post('check-token', 'AuthController@checkToken');

	$router->post('forget-token', 'AuthController@forgetToken');

	$router->post('forgot-tokens', 'AuthController@forgotTokens');

});
