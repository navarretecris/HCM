<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $book = new Book();
        $book->title = 'The Great Gatsby';
        $book->author = 'F. Scott Fitzgerald';
        $book->isbn = '9780743273565';
        $book->quantity = 10;
        $book->price = '9.99';
        $book->pages = '180';
        $book->language = 'en';
        $book->status = 'Available';
        $book->save();

        $book = new Book();
        $book->title = 'To Kill a Mockingbird';
        $book->author = 'Harper Lee';
        $book->isbn = '9780061120084';
        $book->quantity = 5;
        $book->price = '7.99';
        $book->pages = '281';
        $book->language = 'en';
        $book->status = 'Available';
        $book->save();

        $book = new Book();
        $book->title = '1984';
        $book->author = 'George Orwell';
        $book->isbn = '9780451524935';
        $book->quantity = 7;
        $book->price = '11.99';
        $book->pages = '328';
        $book->language = 'en';
        $book->status = 'Available';
        $book->save();

    }
}
