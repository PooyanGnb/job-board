<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyPositionApplicationController;
use App\Http\Controllers\PositionApplicationController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Route;

Route::get("/", fn () => to_route('positions.index'));

Route::resource("positions",PositionController::class)
    ->only(["index", 'show']);

Route::get('login', fn() => to_route('auth.create'))->name('login');
Route::resource("auth",AuthController::class)->only(["create", 'store']);
Route::delete('logout', fn() => to_route('auth.destroy'))->name('logout');
Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
Route::middleware('auth')->group(function () {
    Route::resource('positions.application', PositionApplicationController::class)
        ->only(['create','store']);
    Route::resource('my-position-applications', MyPositionApplicationController::class)
        ->only(['index','destroy']);
});