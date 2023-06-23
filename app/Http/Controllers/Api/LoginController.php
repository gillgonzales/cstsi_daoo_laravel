<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Jogador;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
  public function login(LoginRequest $request) {
    try {
      $jogador = Jogador::where('email', $request->email)->first();
      if (!$jogador || !Hash::check($request->senha, $jogador->senha)) {
        throw New Exception('Senha incorreta.');
      }

      $ability[0] = $jogador->role;
      $token = $jogador->createToken($request->email, $ability)->plainTextToken;
      return response()->json(['token'=>$token]);
    } catch (\Exception $error) {
      return response()->json([
        'erro'=>$error->getMessage()
      ],401);
    }
  }
}
