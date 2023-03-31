<?php

use App\Http\Controllers\JogadorController;
use App\Http\Controllers\JogoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('jogadores',[JogadorController::class,'index']);
Route::get('jogador/{id}',[JogadorController::class,'show']);

Route::get('jogador', [JogadorController::class,'create']);
Route::post('jogador', [JogadorController::class,'store']);

Route::get('jogo',[JogoController::class,'index']);
Route::get('jogo/{id}',[JogoController::class,'show']);