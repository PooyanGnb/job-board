<?php

use App\Http\Controllers\PositionContriller;
use Illuminate\Support\Facades\Route;

Route::resource("positions",PositionContriller::class)
    ->only("index");
