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
    Schema::table('jogadores', function (Blueprint $table) {
      $table->unsignedBigInteger('lobby_id')->nullable();
        //deveria usar cascadeOnDelete?
      $table->foreign('lobby_id')->references('id')->on('lobbys');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('jogadores', function (Blueprint $table) {
      //
    });
  }
};
