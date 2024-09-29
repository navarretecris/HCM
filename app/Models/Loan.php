<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Loan extends Model
{
    use HasFactory, Notifiable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'loan_date',
        'end_date',
        'return_date',
        'status',
    ];

    public function scopeNames($loans, $query){
        if(trim($query)){
            if($query == 'Borrowed'){
                $query = true;
            }else if($query == 'Returned'){
                $query = false;
            }
            $loans->where('loan_date', 'LIKE','%'.$query.'%')
            ->orWhere('end_date', 'LIKE', '%'.$query.'%')
            ->orWhere('return_date', 'LIKE', '%'.$query.'%')
            ->orWhere('status', 'LIKE', '%'.$query.'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}   
