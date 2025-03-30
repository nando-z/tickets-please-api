<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json([
	"message" =>"Api Runing Will",
	"status" => 200,
	"routs"=>[
		"/api/login",
		"/api/register",
		"api/v1/tickets",
	]
],200);
});
