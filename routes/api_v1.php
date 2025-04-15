<?php

use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

// Authenticated routes
Route::middleware('auth:sanctum')->group(function () {
  Route::apiResource('tickets', TicketController::class);
  Route::apiResource('users', UserController::class);
});
