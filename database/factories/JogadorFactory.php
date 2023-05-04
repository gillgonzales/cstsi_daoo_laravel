<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Jogador;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jogador>
 */
class JogadorFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Jogador::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    $faker = \Faker\Factory::create();

    return [
      'nome' => $faker->name(),
      'email' => $faker->email(),
      'senha' => $faker->password(),
      'dataNasc' => $faker->dateTimeThisCentury()->format('Y-m-d'),
      'bio' => $faker->text(250),
      'urlFoto' => $faker->imageUrl(640, 480, 'animals'),
      'horarioInicio' => $faker->time('H:i:s'),
      'horarioFim' => $faker->time('H:i:s'),
    ];
  }
}
