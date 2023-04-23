<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('lobbys', function (Blueprint $table) {
      $table->id();
      $table->string('nome');
      $table->string('senha');
      $table->integer('maxJogadores');
      $table->boolean('convidar');
      $table->foreignId('jogador_id')->references('id')->on('jogadores')->cascadeOnDelete();
      $table->foreignId('jogo_id')->constrained()->cascadeOnDelete();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('lobbies');
  }
};
