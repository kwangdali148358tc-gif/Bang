<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'description' => $this->faker->paragraph(),
            'genre' => $this->faker->randomElement(['Fiction', 'Sci-Fi', 'Mystery', 'Romance']),
            'published_year' => $this->faker->numberBetween(1900, 2024),
            'isbn' => $this->faker->isbn13(),
            'pages' => $this->faker->numberBetween(100, 600),
            'language' => 'English',
            'publisher' => $this->faker->company(),
            'price' => $this->faker->randomFloat(2, 5, 50),
            'is_available' => true,
            'cover_image' => null, // No upload in factory
        ];
    }
}
