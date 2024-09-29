<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());
        // crear con ORM

        $user = new User();
        $user->name = $request->name;
        $user->document_type = $request->document_type;
        $user->document = $request->document;
        $user->id_card = $request->id_card;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if($user->save()){
            return redirect('users')->with('message', 'User '.$user->name.' Successfully Created');
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
        //return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
        $user->name = $request->name;
        $user->document_type = $request->document_type;
        $user->document = $request->document;
        $user->id_card = $request->id_card;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->email = $request->email;

        if($user->save()){
            return redirect('users')->with('message', 'User '.$user->name.' Successfully updated');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(user $user)
    {
        //
        if($user->delete()){
            return redirect('users')->with('message', 'User '.$user->name.' Successfully deleted');
        }
    }

    public function search(Request $request){
        $users = User::names($request->q)->get();
        return view('users.search')->with('users', $users);
    }
}