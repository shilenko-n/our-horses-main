<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->prefix('media')->group(function(Router $router) {

	$router->post('{media}/delete', 'MediaController@delete');

	$router->post('positioning', 'MediaController@positioning');

});
