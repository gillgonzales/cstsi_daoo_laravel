<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
  use HasFactory;

  protected $table = 'jogadores';
  protected $fillable = ['admin', 'nome', 'email', 'senha', 'dataNasc', 'bio', 'urlFoto', 'horarioInicio', 'horarioFim'];

  public function lobby()
  {
    return $this->belongsTo(Lobby::class, 'lobby_id', 'id');
  }

  public function jogos()
  {
    return $this->belongsToMany(Jogo::class);
  }
}
