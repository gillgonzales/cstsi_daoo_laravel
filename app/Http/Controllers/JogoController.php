<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class JogoController extends Controller
{
  private Jogo $jogo;

  public function __construct()
  {
    $this->jogo = new Jogo();
  }

  public function index()
  {
    return view('jogo.index', ["jogos" => $this->jogo->all()]);
  }

  public function show($id)
  {
    return view('jogo.show', ["jogo" => $this->jogo->find($id)]);
  }
}
