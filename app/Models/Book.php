<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'quantity',
        'price',
        'pages',
        'language',
        'status',
    ];

    public function scopeNames($books, $query){
        if(trim($query)){
            $books->where('title', 'LIKE','%'.$query.'%')
            ->orWhere('author', 'LIKE', '%'.$query.'%')
            ->orWhere('isbn', 'LIKE', '%'.$query.'%');
        }
    }

    public function books(){
        return $this->belongsToMany(Book::class, 'loans')
            ->withPivot('loan_date', 'end_date', 'return_date', 'status')
            ->withTimestamps();
    }
}