<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        \App\Models\User::factory(15)->create();
        \App\Models\Book::factory(25)->create();
        \App\Models\Post::factory(10)->create();
        \App\Models\Ideas::factory(10)->create();
        \App\Models\Borrowing::factory(25)->create();
        \App\Models\Acquisition::factory(20)->create();
    }
}
