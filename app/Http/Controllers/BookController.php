<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::all();
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        //

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->pages = $request->pages;
        $book->language = $request->language;
        $book->status = $request->status;

        if($book->save()){
            return redirect('books')->with('message', 'Book '.$book->title.' Successfully Created');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        //
        $book->title = $request->title;
        $book->author = $request->author;
        $book->isbn = $request->isbn;
        $book->quantity = $request->quantity;
        $book->price = $request->price;
        $book->pages = $request->pages;
        $book->language = $request->language;
        $book->status = $request->status;

        if($book->save()){
            return redirect('books')->with('message', 'Book '.$book->title.' Successfully Updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        if($book->delete()){
            return redirect('books')->with('message', 'Book '.$book->title.' Successfully Deleted');
        }
    }

    public function search(Request $request){
        $books = Book::names($request->q)->get();
        return view('books.search')->with('books', $books);
    }

    
}
