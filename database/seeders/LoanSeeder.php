<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\Book;
use App\Models\User;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::first();
        $book = Book::first();
        $loan = new Loan();
        $loan->loan_date = '2024-09-24';
        $loan->end_date = '2024-10-24';
        $loan->return_date = '2024-10-24';
        $loan->status = false;
        $loan->user_id = $user->id;
        $loan->book_id = $book->id;
        $loan->save();

    }
}
