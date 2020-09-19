<?php

namespace Database\Factories;

use App\Models\Medios;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class mediosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name
        ];
    }
}
