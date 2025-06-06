<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Services\ApiResponse;
use Illuminate\Support\Facades\Route;

Route::get('/status', function(){
    return ApiResponse::success('API is running');
})->middleware('auth:sanctum');

Route::apiResource('clients', ClientController::class)->middleware('auth:sanctum');

// auth route
Route::post('/login', [AuthController::class, 'login']);
// Logout
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');