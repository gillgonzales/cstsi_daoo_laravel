<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('amizades', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('jogador_id');
      $table->unsignedBigInteger('amigo_id');
      $table->timestamps();

      $table->foreign('jogador_id')->references('id')->on('jogadores')->onDelete('cascade');
      $table->foreign('amigo_id')->references('id')->on('jogadores')->onDelete('cascade');
    });
  }

  public function down()
  {
    Schema::dropIfExists('amizades');
  }
};
