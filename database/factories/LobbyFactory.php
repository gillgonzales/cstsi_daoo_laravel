<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lobby;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lobby>
 */
class LobbyFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  protected $model = Lobby::class;

  public function definition(): array
  {
    $faker = \Faker\Factory::create();

    return [
      'nome' => $faker->name(),
      'senha' => $faker->password(),
      'maxJogadores' => fake()->numberBetween(1, 30),
      'convidar' => fake()->numberBetween(0, 1),
      'jogador_id' => fake()->numberBetween(1, 20),
      'jogo_id' => fake()->numberBetween(1, 20),
    ];
  }
}
