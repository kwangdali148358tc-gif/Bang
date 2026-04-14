<?php

namespace Database\Factories;

use App\Models\Acquisition;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcquisitionFactory extends Factory
{
    protected $model = Acquisition::class;

    public function definition(): array
    {
        return [
            'book_id' => \App\Models\Book::factory(),
            'acquisition_date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'supplier' => $this->faker->company(),
            'cost' => $this->faker->randomFloat(2, 10, 100),
            'quantity_added' => $this->faker->numberBetween(1, 10),
            'notes' => $this->faker->optional(0.7)->sentence(),
        ];
    }
}
