<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lobby extends Model
{
  use HasFactory;

  protected $table = 'lobbys';
  protected $fillable = ['nome', 'maxJogadores', 'convidar', 'senha'];

  public function jogador()
  {
    return $this->hasOne(Jogador::class, 'id', 'jogo_id');
  }

  public function jogo()
  {
    return $this->belongsTo(Jogo::class);
  }
}
