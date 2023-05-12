<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lobby;

class LobbyController extends Controller
{
  public function index() 
  {
    return response()->json(Lobby::all());
  }

  public function show($id) 
  {
    try {
      return response()->json(Lobby::findOrFail($id));            
    } catch (\Exception $error) {
      $responseError = [
        'Erro' => "Produto não encontrado.",
        'Excption' => $error->getMessage(),
      ];
      return response()->json($responseError, 404);
    }
  }

  public function store(Request $request) 
  {
    try {
      $newLobby = $request->all();
      $storedLobby = Lobby::create($newLobby);
      return response()->json([
        'Message' => 'Lobby inserido com sucesso.',
        'Lobby' => $storedLobby,
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Erro' => "Erro ao inserir lobby.",
        'Excption' => $error->getMessage(),
      ];
      return response()->json($responseError, 404);
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $newLobby = $request->all();
      $updatedLobby = Lobby::findOrFail($id);
      $updatedLobby->update($newLobby);
      return response()->json([
        'Message'=>"Produto atualizado com sucesso",
        'Produto'=>$updatedLobby,
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Message'=>"Erro ao inserir o Produto!",
        'Exception'=>$error->getMessage(),
      ];
      return response()->json($responseError, 500);
    }
  }

  public function remove($id)
  {
    try {
      Lobby::findOrFail($id)->delete();
      return response()->json([
        'Message'=>"Lobby id:$id removido!",
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Message'=>"O lobby de id: $id não foi encontrado!",
        'Exception'=>$error->getMessage(),
      ];
      return response()->json($responseError, 404);
    }
  }
}

