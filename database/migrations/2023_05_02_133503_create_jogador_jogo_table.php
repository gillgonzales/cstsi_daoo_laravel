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
    Schema::create('jogador_jogo', function (Blueprint $table) {
      $table->foreignId('jogador_id')->references('id')->on('jogadores')->cascadeOnDelete();
      $table->foreignId('jogo_id')->constrained()->onDelete('cascade');
      $table->primary(['jogador_id', 'jogo_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('jogador_jogo');
  }
};
