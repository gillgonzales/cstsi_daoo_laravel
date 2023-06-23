<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LobbyRequest;
use App\Models\Lobby;

class LobbyController extends Controller
{
  public function index() 
  {
    return response()->json(Lobby::all());
  }

  public function show(Lobby $lobby) 
  {
    try {
      return response()->json($lobby);           
    } catch (\Exception $error) {
      $responseError = [
        'Erro' => "lobby não encontrado.",
        'Excption' => $error->getMessage(),
      ];
      return response()->json($responseError, 404);
    }
  }

  public function store(LobbyRequest $request) 
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

  public function update(LobbyRequest $request, Lobby $lobby)
  {
    try {
      $updatedLobby = $request->all();
      $lobby->update($updatedLobby);
      return response()->json([
        'Message'=>"Lobby atualizado com sucesso",
        'Lobby'=>$updatedLobby,
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Message'=>"Erro ao atualizar Lobby!",
        'Exception'=>$error->getMessage(),
      ];
      return response()->json($responseError, 500);
    }
  }

  public function destroy(Lobby $lobby)
  {
    try {
      $lobby->delete();
      return response()->json([
        'Message'=>"Lobby id: $lobby->id removido!",
      ]);
    } catch (\Exception $error) {
      $responseError = [
        'Message'=>"O lobby de id: $lobby->id não foi encontrado!",
        'Exception'=>$error->getMessage(),
      ];
      return response()->json($responseError, 404);
    }
  }
}

