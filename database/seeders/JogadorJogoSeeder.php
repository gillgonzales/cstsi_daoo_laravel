<?php

namespace Database\Seeders;

use App\Models\Jogador;
use App\Models\Jogo;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class JogadorJogoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $listJogadores = Jogador::all();
    $countJogos = Jogo::count();

    if (!$countJogos || !$listJogadores->count()) {
      throw new Exception('Error: registrar jogadores e/ou jogos!');
    }

    $now = Carbon::now()->toDateTimeString();

    Log::channel('stderr')->info('Relacionando jogadores e jogos...');
    
    $listJogadores->each(function ($jogador) use ($countJogos) {
      $numJogos = rand(0, 5);
      $jogos = [];
      if ($numJogos > 0) {
        do{
          $num = rand(1, $countJogos);
          if (!in_array($num, $jogos)) {
            $jogos[] = $num;
          }
        } while(count($jogos) < $numJogos);  
        $jogador->jogos()->attach($jogos);
      }
    });
    
  }
}
