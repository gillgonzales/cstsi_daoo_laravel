<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\User::factory(3)->create();
    Log::channel('stderr')->info('Gerando jogadores...');
    \App\Models\Jogador::factory(20)->create();
    Log::channel('stderr')->info('jogadores inseridos com sucesso.');
    (new AmizadeSeeder)->run();
    (new JogoSeeder)->run();
    Log::channel('stderr')->info('Gerando lobbys...');
    \App\Models\Lobby::factory(10)->create();
    Log::channel('stderr')->info('Lobbys inseridos com sucesso.');
    (new JogadorJogoSeeder)->run();
    (new JogadorLobby)->run();
  }
}
