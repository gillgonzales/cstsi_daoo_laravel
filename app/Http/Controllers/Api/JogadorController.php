<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\JogadorRequest;
use App\Models\Jogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JogadorController extends Controller
{
  public function index(Request $request)
  {
    $perPage = $request->query('per_page');
    $jogadoresPaginated = Jogador::paginate($perPage);
    $jogadoresPaginated->appends([
      'per_page' => $perPage
    ]);
    return response()->json($jogadoresPaginated);
  }


  public function store(JogadorRequest $request)
  {
    $status = 200;
    try{
      $newJogador = $request->all();
      $newJogador['senha'] = Hash::make($newJogador['senha']);

      $createdJogador = Jogador::create($newJogador);
      $createdJogador->markEmailAsVerified();

      $response = [
        'mensagem'=>'Jogador cadastrado com sucesso!!',
        'jogador'=>$createdJogador
      ];
    }catch(\Exception $error){
      $status = 500;
      $response = ['error'=>$error->getMessage()];
    }
    return response()->json($response,$status);
  }

  public function show(Jogador $jogador)
  {
    return response()->json($jogador);
  }

  public function update(JogadorRequest $request, Jogador $jogador)
  {
    $status = 200;
    try {
      $updatedJogador = $request->all();
      $jogador->update($updatedJogador);
      $response = [
        'Message' => "jogador atualizado com sucesso",
        'jogador' => $jogador
      ];
    } catch (\Exception $error) {
      $status = 500;
      $response = [
        'Message' => "Erro ao atualizar o jogador!",
        'Exception' => $error->getMessage()
      ];
    }
    return response()->json($response, $status);
  }

  public function destroy(Jogador $jogador)
  {
    $status = 200;
    try {
      $jogador->delete();
      $response = [
        'Message' => "jogador id:$jogador->id removido!",
      ];
    } catch (\Exception $error) {
      $status = 500;
      $response = [
        'Message' => "Erro ao deletar jogador de id: $jogador->id!",
        'Exception' => $error->getMessage()
      ];
    }
    return response()->json($response, $status);
  }
}