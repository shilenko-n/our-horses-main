<?php

use Illuminate\Support\Facades\Route;

foreach (glob(base_path("routes/api/*.php")) as $filename) {
	include $filename;
}
