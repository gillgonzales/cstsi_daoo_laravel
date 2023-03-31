<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
  private Jogador $jogador;

  public function __construct()
  {
    $this->jogador = new Jogador();
  }

  public function index()
  {
    return view('jogador.index', ["jogadores" => $this->jogador->all()]);
  }

  public function show($id)
  {
    return view('jogador.show', ["jogador" => $this->jogador->find($id)]);
  }

  public function create()
  {
    return view('jogador.create');
  }

  public function store(Request $request)
  {
    $newJogador = $request->all();
    $newJogador['admin'] = $request->has('admin');
    $newJogador['urlFoto'] = $newJogador['nome'].'.png';

    if (!Jogador::create($newJogador)) {
      dd("Error ao criar jogador!!");
    }
    return redirect('/jogadores');
  }
}
