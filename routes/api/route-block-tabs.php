<?php

use Illuminate\Support\Facades\Route;

Route::post('blocks/{block}/tabs/{tab}', 'RouteBlockTabController@show');
