<?php

use App\Http\Controllers\PositionContriller;
use Illuminate\Support\Facades\Route;

Route::get("/", fn () => to_route('positions.index'));

Route::resource("positions",PositionContriller::class)
    ->only(["index", 'show']);
