<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use App\Models\Loan;
use App\Models\User;
use App\Models\Book;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $loans = Loan::with(['user', 'book'])->get();
        $users = User::all();
        $books = Book::all();
        return view('loans.index')->with(['loans'=> $loans, 'users' => $users, 'books' => $books]);
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
    public function store(LoanRequest $request)
    {
        //
        $loan = new Loan();
        $loan -> loan_date = date('Y-m-d H:i:s');
        $loan -> user_id = $request -> user_id;
        $loan -> book_id = $request -> book_id;
        $loan -> status = $request -> status;

        if($loan->save()){
            return redirect('loans')->with('message', 'Loan '.$loan->id.' Successfully Created');
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
    public function update(LoanRequest $request, Loan $loan)
    {
        //
        $loan->end_date = date('Y-m-d H:i:s');
        $loan->return_date = date('Y-m-d H:i:s');
        $loan->status = $request -> status;

        if($loan->save()){
            return redirect('loans')->with('message', 'Loan '.$loan->id.' Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        if(Loan::destroy($id)){
            return redirect('loans')->with('message', 'Loan '.$id.' Successfully Deleted');
        }
    }

    public function search(Request $request)
    {
        $loans = loan::names($request->q)->get();
        return view('loans.search')->with('loans', $loans);
    }
}
