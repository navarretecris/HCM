<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resources([
        'users' => UserController::class,
        'books' => BookController::class,
        'loans' => LoanController::class,
       
    ]);

    Route::post('users/search', [UserController::class, 'search']);
    Route::post('books/search', [BookController::class, 'search']);
    Route::post('loans/search', [LoanController::class, 'search']);   

});

// exportaciones excel y pdf

Route::get('exports/users/pdf', [UserController::class, 'pdf']);
Route::get('exports/users/excel', [UserController::class, 'excel']);


require __DIR__.'/auth.php';