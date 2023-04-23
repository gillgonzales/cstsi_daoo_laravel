<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\Jogador::factory(20)->create();
    (new JogoSeeder)->run();
    \App\Models\Lobby::factory(10)->create();
  }
}
