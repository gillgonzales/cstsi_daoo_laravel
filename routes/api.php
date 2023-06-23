<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JogadorController;
use App\Http\Controllers\Api\LobbyController;
use App\Http\Controllers\Api\jogoController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\UserController;

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

Route::apiResource('jogadores', JogadorController::class)->parameters([
  'jogadores' => 'jogador'
]);

Route::apiResource('lobbys', LobbyController::class)->middleware('auth:sanctum');

Route::apiResource('jogos', JogoController::class)->middleware('auth:sanctum');
Route::get('jogos/{jogo}/jogadores', [JogoController::class, 'jogadores'])->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login'])->name('login');
