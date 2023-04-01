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
    return view('jogo.create');
  }

  public function store(Request $request)
  {
    $newJogador = $request->all();
    $newJogador['admin'] = $request->has('admin');
    $newJogador['urlFoto'] = $newJogador['nome'] . '.png';

    if (!Jogador::create($newJogador)) 
      dd("Error ao criar jogador!!");

    return redirect('/jogadores');
  }

  public function edit($id)
  {
    return view('jogador.edit', ['jogador' => Jogador::find($id)]);
  }

  public function update(Request $request, $id)
  {
    $newJogador = $request->all();
    $newJogador['urlFoto'] = $newJogador['nome'] . '.png';
    if (!Jogador::find($id)->update($newJogador)) 
      dd("Error ao atualizar dados do Jogador!!");
    return redirect('/jogadores');
  }

  public function delete($id)
  {
    return view('jogador.delete', ['jogador' => Jogador::find($id)]);
  }

  public function remove(Request $request, $id)
  {
    if ($request->has('confirmar'))
      if (!Jogador::destroy($id))
        dd("Error ao deletar jogador!!");

    return redirect('/jogadores');
  }
}
