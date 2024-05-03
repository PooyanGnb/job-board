<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn () => to_route('positions.index'));

Route::resource("positions",PositionController::class)
    ->only(["index", 'show']);

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource("auth",AuthController::class)->only(["create", 'store']);
