<?php

use Illuminate\Support\Facades\Route;

Route::post('recall', 'RecallController@recall')->name('api.recall');
