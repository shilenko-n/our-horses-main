<?php

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::post('notices/store', 'NoticeController@store');

Route::middleware('auth:sanctum')->prefix('notices')->group(function(Router $router) {

	$router->post('list', 'NoticeController@list');

	$router->post('{notice}/read', 'NoticeController@read');

	$router->post('{notice}/delete', 'NoticeController@delete');

});
