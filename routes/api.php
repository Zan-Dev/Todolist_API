<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodolistController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::apiResource('/todolists', TodolistController::class);
Route::apiResource('/users', UserController::class);
Route::post('auth/login', [AuthController::class, 'login']);