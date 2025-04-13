<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('migrate', function () {
    $this->comment('Running migrations...');
    Artisan::call('migrate');
    $this->info('Migrations completed successfully.');
})->purpose('Run database migrations');

Artisan::command('migrate:rollback', function () {
    $this->comment('Rolling back migrations...');
    Artisan::call('migrate:rollback');
    $this->info('Migrations rolled back successfully.');
})->purpose('Rollback database migrations');

Artisan::command('db:seed', function () {
    $this->comment('Seeding database...');
    Artisan::call('db:seed');
    $this->info('Database seeded successfully.');
})->purpose('Seed the database');
