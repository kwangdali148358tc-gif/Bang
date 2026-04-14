<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Borrowing;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowingFactory extends Factory
{
    protected $model = Borrowing::class;

    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'book_id' => \App\Models\Book::factory(['is_available' => true]),
            'borrow_date' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'due_date' => $this->faker->dateTimeBetween('+1 day', '+3 weeks'),
            'return_date' => $this->faker->optional(0.6)->dateTimeBetween('-1 month', 'now'),
            'status' => $this->faker->randomElement(['pending', 'returned', 'overdue']),
            'fine_amount' => $this->faker->randomFloat(2, 0, 50),
        ];
    }
}
