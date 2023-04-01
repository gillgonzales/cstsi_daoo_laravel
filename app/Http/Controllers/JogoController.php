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

  public function edit($id)
  {
    return view('jogo.edit', ['jogo' => Jogo::find($id)]);
  }

  public function update(Request $request, $id)
  {
    $newJogo = $request->all();
    $newJogo['urlFoto'] = $newJogo['nome'] . '.png';
    if (!Jogo::find($id)->update($newJogo)) 
      dd("Error ao atualizar dados do Jogo!!");
    return redirect('/jogos');
  }

  public function delete($id)
  {
    return view('jogo.delete', ['jogo' => Jogo::find($id)]);
  }

  public function remove(Request $request, $id)
  {
    if ($request->has('confirmar'))
      if (!jogo::destroy($id))
        dd("Error ao deletar jogo!!");

    return redirect('/jogos');
  }
}
