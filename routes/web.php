<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        "Application" => "Laravel Api",
        "Version" => app()->version(),
        "Environment" => app()->environment(),
        "Documentation" => [
            "API Documentation" => url('/api/docs'),
            "Laravel Documentation" => url('https://laravel.com/docs'),
        ],
    ];
});
