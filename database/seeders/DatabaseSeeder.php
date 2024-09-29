<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Loan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Book::factory(5)->create();

        $this->call([
            UserSeeder::class,
            BookSeeder::class,
            LoanSeeder::class,
        ]);
    }
}
