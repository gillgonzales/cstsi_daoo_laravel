<?php

namespace Database\Seeders;

use App\Models\Jogador;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class JogadorLobby extends Seeder
{
  public function run(): void
  {
    $jogadores = Jogador::all();

    if (!$jogadores->count()) {
      throw new Exception('Error: relacionar jogador lobby!');
    }

    Log::channel('stderr')->info('Relacionando jogadores e lobbys...');

    foreach ($jogadores as $jogador) {
      $jogador->lobby_id = rand(0,10) != 0 ? rand(1, 10) : null;
      $jogador->save();
    }

    Log::channel('stderr')->info('Lobbys relacionados com sucesso.');
  }
}
