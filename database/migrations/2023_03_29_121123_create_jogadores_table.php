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
    Schema::create('jogadores', function (Blueprint $table) {
      $table->id();
      $table->boolean('admin')->default(false);
      $table->string('nome');
      $table->string('email');
      $table->timestamp('email_verified_at')->nullable();
      $table->string('senha');
      $table->date('dataNasc');
      $table->string('bio');
      $table->string('urlFoto');
      $table->time('horarioInicio');
      $table->time('horarioFim');
      $table->rememberToken();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('jogadores');
  }
};
