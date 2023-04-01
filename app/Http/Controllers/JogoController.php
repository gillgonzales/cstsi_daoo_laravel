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

  public function create()
  {
    return view('jogo.create');
  }

  public function store(Request $request)
  {
    $newJogo = $request->all();
    $newJogo['urlFoto'] = $newJogo['nome'] . '.png';

    if (!Jogo::create($newJogo)) 
      dd("Error ao criar jogo!!");
      
    return redirect('/jogos');
  }
}
