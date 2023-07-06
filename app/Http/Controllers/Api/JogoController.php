<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JogoRequest;
use Illuminate\Http\Request;
use App\Models\Jogo;

class JogoController extends Controller
{
  private $jogo;

  public function __construct(jogo $jogo)
  {
    $this->jogo = $jogo;
  }

  public function index(Request $request)
  {
    $perPage = $request->query('per_page');
    $jogosPaginated = Jogo::paginate($perPage);
    $jogosPaginated->appends([
      'per_page' => $perPage
    ]);
    return response()->json($jogosPaginated);
  }

  public function show(Jogo $jogo)
  {
    return response()->json($jogo);
  }

  public function store(JogoRequest $request)
  {
    try {
      $createdJogo = $request->all();
      $storedJogo = Jogo::create($createdJogo);
      return response()->json([
        'Message' => "Jogo inserido com sucesso",
        'Jogo' => $storedJogo
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Message' => "Erro ao inserir o jogo!",
        'Exception' => $error->getMessage()
      ];
      return response()->json($responseError, 500);
    }
  }

  public function update(JogoRequest $request, Jogo $jogo)
  {
    try {
      $updatedJogo = $request->all();
      $jogo->update($updatedJogo);
      return response()->json([
        'Message' => "Jogo atualizado com sucesso",
        'Jogo' => $jogo
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Message' => "Erro ao atualizar o jogo!",
        'Exception' => $error->getMessage()
      ];
      return response()->json($responseError, 500);
    }
  }

  public function destroy(Jogo $jogo)
  {
    try {
      $jogo->delete();
      return response()->json([
        'Message' => "jogo id:$jogo->id removido!",
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Message' => "O jogo de id: $jogo->id não foi encontrado!",
        'Exception' => $error->getMessage()
      ];
      return response()->json($responseError, 404);
    }
  }

  public function jogadores(Jogo $jogo)
  {
    return response()->json($jogo->load('jogadores'));
  }
}
