<?php

namespace Database\Seeders;

use App\Models\Jogador;
use Illuminate\Database\Seeder;


class JogadorLobby extends Seeder
{
  public function run(): void
  {
    $jogadores = Jogador::all();

    foreach ($jogadores as $jogador) {
      $jogador->lobby_id = rand(0,10) != 0 ? rand(1, 10) : null;
      $jogador->save();
    }
  }
}
