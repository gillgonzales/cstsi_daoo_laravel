<?php

namespace Database\Seeders;

use App\Models\Jogador;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class AmizadeSeeder extends Seeder
{
  public function run(): void
  {
    $listJogadores = Jogador::all();
    $countJogadores = Jogador::count();

    if (!$countJogadores) {
      throw new Exception('Error: registrar amigos!');
    }

    Log::channel('stderr')->info('Relacionando amigos...');

    $listJogadores->each(function ($jogador) use ($countJogadores) {
      $numAmigos = rand(0, $countJogadores);
      $amigos = [];
      if ($numAmigos > 0) {
        do {
          $num = rand(1, $countJogadores);
          if (!in_array($num, $amigos)) {
            $amigos[] = $num;
          }
        } while (count($amigos) < $numAmigos);
        $jogador->amizades()->attach($amigos);
      }
    });
    Log::channel('stderr')->info('amizades inseridas com sucesso.');
  }
}
