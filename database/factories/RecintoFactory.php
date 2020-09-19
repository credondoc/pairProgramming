<?php

namespace Database\Factories;

use App\Models\Recinto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class recintoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recinto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'nombre' => $this->faker->name(),
            'coste_alquiler' => rand(100000, 500000),
            'precio_entrada' => rand(10, 50)
        ];
    }
}
