<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Jogador extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  protected $table = 'jogadores';
  protected $fillable = ['role', 'nome', 'email', 'senha', 'dataNasc', 'bio', 'urlFoto', 'horarioInicio', 'horarioFim'];

  protected $hidden = ['senha', 'remember_token',];

  public function lobby()
  {
    return $this->belongsTo(Lobby::class, 'lobby_id', 'id');
  }

  public function jogos()
  {
    return $this->belongsToMany(Jogo::class);
  }

  public function amizades()
  {
    return $this->belongsToMany(Jogador::class, 'amizades', 'jogador_id', 'amigo_id');
  }
}
