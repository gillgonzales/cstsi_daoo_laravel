<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JogadorController;
use App\Http\Controllers\Api\LobbyController;
use App\Http\Controllers\Api\jogoController;
use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//   return $request->user();
// });

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () 
{
  Route::apiResource('jogadores', JogadorController::class)->parameters([
    'jogadores' => 'jogador'
  ])->middleware('ability:client,manager,admin');

  Route::apiResource('lobbys', LobbyController::class)
    ->middleware('ability:manager,admin');

  Route::get('lobbys', [LobbyController::class, 'index'])
    ->middleware('ability:client,manager,admin');

  Route::apiResource('jogos', JogoController::class)
    ->middleware('ability:admin');

  Route::get('jogos', [jogoController::class, 'index'])
    ->middleware('ability:client,manager,admin');

  Route::get('jogos/{jogo}/jogadores', [JogoController::class, 'jogadores'])
    ->middleware('ability:admin');
});

Route::post('jogadores', [JogadorController::class, 'store']);