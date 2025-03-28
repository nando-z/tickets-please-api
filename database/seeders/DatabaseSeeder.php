<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // recycles that will create 10 users and 50 tickets for each user
    $user = User::factory(10)->create();
    Ticket::factory(50)
      ->recycle($user)
      ->create();
  }
}
