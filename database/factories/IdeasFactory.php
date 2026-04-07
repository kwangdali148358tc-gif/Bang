<?php

namespace Database\Factories;

use App\Models\Ideas;
use Illuminate\Database\Eloquent\Factories\Factory;

class IdeasFactory extends Factory
{
    protected $model = Ideas::class;

    public function definition(): array
    {
        return [
            'description' => fake()->paragraph(),
        ];
    }
}

