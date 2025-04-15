<?php

use App\Http\Controllers\API\UserInfoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Document as DocumentController;
use Illuminate\Support\Facades\Route;

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user',UserInfoController::class);

});

// Public routes
Route::post('/login', [AuthController::class, 'login']);

Route::post('/register', [AuthController::class, 'register']);

Route::get('/docs',DocumentController::class );