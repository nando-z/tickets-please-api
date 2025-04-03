<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return response()->json([

		"message" => "Api Runing Will",
		"status" => 200,
		"routs" => [
			"/api/login" => "https:127.0.0.1:8000/api/login",
			"/api/register" => "https:127.0.0.1:8000/api/v1/register",
			"api/v1/tickets" => "https:127.0.0.1:8000/api/v1/tickets",

		]
	]);
});