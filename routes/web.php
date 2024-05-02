<?php

use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn () => to_route('positions.index'));

Route::resource("positions",PositionController::class)
    ->only(["index", 'show']);
