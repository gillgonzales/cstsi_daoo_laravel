<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index(Request $request)
  {
    $perPage = $request->query('per_page');
    $usersPaginated = User::paginate($perPage);
    $usersPaginated->appends([
      'per_page' => $perPage
    ]);
    return response()->json($usersPaginated);
  }


  public function store(UserRequest $request)
  {
    $status = 200;
    try{
      $newUser = $request->all();
      $newUser['password'] = Hash::make($newUser['password']);

      $createdUser = User::create($newUser);
      $createdUser->markEmailAsVerified();

      $response = [
        'mensagem'=>'Usuário cadastrado com sucesso!!',
        'user'=>$createdUser
      ];
    }catch(\Exception $error){
      $status = 500;
      $response = ['error'=>$error->getMessage()];
    }
    return response()->json($response,$status);
  }

  public function show(User $user)
  {
    return response()->json($user);
  }

  public function update(Request $request, User $user)
  {
    $status = 200;
    try {
      $updatedUser = $request->all();
      $user->update($updatedUser);
      $response = [
        'Message' => "User atualizado com sucesso",
        'user' => $user
      ];
    } catch (\Exception $error) {
      $status = 500;
      $response = [
        'Message' => "Erro ao atualizar o jogo!",
        'Exception' => $error->getMessage()
      ];
    }
    return response()->json($response, $status);
  }

  public function destroy(User $user)
  {
    $status = 200;
    try {
      $user->delete();
      $response = [
        'Message' => "User id:$user->id removido!",
      ];
    } catch (\Exception $error) {
      $status = 500;
      $response = [
        'Message' => "Erro ao deletar user de id: $user->id!",
        'Exception' => $error->getMessage()
      ];
    }
    return response()->json($response, $status);
  }
}
