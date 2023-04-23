<?php

namespace Database\Seeders;

use App\Models\Jogo;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class JogoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    try{
      if (Jogo::all()->count()) {
        Log::channel('stderr')->info("O banco já possui Jogos!");
        print_r(Jogo::all()->pluck('nome','id'));
        return;
      }

      $jsonUrl = 'https://api.rawg.io/api/games?key=8d2a9579537a403b83647b6087741209&ordering=rating-released&page=1';
      $response = Http::get($jsonUrl);
      $jogos = $response->json()['results'];

      if (!$jogos)
        throw new \Exception("Erro ao carregar arquivo JSON de Jogos!\nURL:$jsonUrl");

      $listJogos = [];  
      foreach ($jogos as $jogo)
        $listJogos[] = [
          "nome" => $jogo['name'],
          "urlFoto" => $jogo['background_image'],
        ];

      if (!Jogo::insert($listJogos))
        throw new \Exception("Erro ao inserir jogos!", 1);

      Log::channel('stderr')->info("Jogos inseridos com sucesso!");
    } catch(Exception $error) {
      throw new Exception("Erro ao processar o seed de Jogos!\n {$error->getMessage()}");
    }
  }
}
