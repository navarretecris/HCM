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

        $book = new Book();
        $book->title = 'The Catcher in the Rye';
        $book->author = 'J.D. Salinger';
        $book->isbn = '9780316769488';
        $book->quantity = 3;
        $book->price = '8.99';
        $book->pages = '277';
        $book->language = 'en';
        $book->status = 'Available';
        $book->save();

        $book = new Book();
        $book->title = 'Lord of the Flies';
        $book->author = 'William Golding';
        $book->isbn = '9780399501487';
        $book->quantity = 6;
        $book->price = '10.99';
        $book->pages = '224';
        $book->language = 'en';
        $book->status = 'Available';
        $book->save();

        $book = new Book();
        $book->title = 'Animal Farm';
        $book->author = 'George Orwell';
        $book->isbn = '9780451526342';
        $book->quantity = 4;
        $book->price = '9.99';
        $book->pages = '141';
        $book->language = 'en';
        $book->status = 'Available';
        $book->save();

        $book = new Book();
        $book->title = 'Brave New World';
        $book->author = 'Aldous Huxley';
        $book->isbn = '9780060850524';
        $book->quantity = 8;
        $book->price = '12.99';
        $book->pages = '288';
        $book->language = 'en';
        $book->status = 'Available';
        $book->save();

    }
}
