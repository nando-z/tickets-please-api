<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        "Application" => "Laravel",
        "Version" => app()->version(),
        "Environment" => app()->environment(),
        "Routes" => [
            "GET /" => "Home",
            "GET /api" => "API Home",
            "GET /api/users" => "User List",
            "POST /api/users" => "Create User",
            "GET /api/users/{id}" => "User Details",
            "PUT /api/users/{id}" => "Update User",
            "DELETE /api/users/{id}" => "Delete User",
        ],
        "Documentation" => [
            "API Documentation" => url('/api/docs'),
            "Laravel Documentation" => url('https://laravel.com/docs'),
        ],
    ];
});
