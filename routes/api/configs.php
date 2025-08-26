<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->post('configs/{config}', 'ConfigController@get');
