<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class JogadorRoleSeeder extends Seeder
{
  public function run(): void
  {
    \App\Models\Jogador::factory()->create([
      'role' => 'client',
      'nome' => 'Bia',
      'email' => 'bia@email.com',
      'senha' => Hash::make('senha5'),
      'dataNasc' => '2000-01-01',
      'bio' => 'apenas uma Bia',
      'urlFoto' => 'https://bia.png.com',
      'horarioInicio' => '10:00',
      'horarioFim' => '10:00',
    ]);

    \App\Models\Jogador::factory()->create([
      'role' => 'manager',
      'nome' => 'Carl',
      'email' => 'carl@email.com',
      'senha' => Hash::make('senha5'),
      'dataNasc' => '2000-01-01',
      'bio' => 'apenas um Carl',
      'urlFoto' => 'https://carl.png.com',
      'horarioInicio' => '18:00',
      'horarioFim' => '23:00',
    ]);

    \App\Models\Jogador::factory()->create([
      'role' => 'admin',
      'nome' => 'Dora',
      'email' => 'dora@email.com',
      'senha' => Hash::make('senha5'),
      'dataNasc' => '2000-01-01',
      'bio' => 'apenas uma Dora',
      'urlFoto' => 'https://dora.png.com',
      'horarioInicio' => '00:00',
      'horarioFim' => '2:00',
    ]);
    
    Log::channel('stderr')->info('Usuários com papéis inseridos com sucesso.');
  }
}
