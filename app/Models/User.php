<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'document_type',
        'document',
        'id_card',
        'role',
        'status',
        'photo',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeNames($users, $query){
        if(trim($query)){
            $users->where('name', 'LIKE','%'.$query.'%')
            ->orWhere('email', 'LIKE', '%'.$query.'%')
            ->orWhere('document', 'LIKE', '%'.$query.'%');
        }
    }

    public function users(){
        return $this->belongsToMany(User::class, 'loans')
            ->withPivot('loan_date', 'end_date', 'return_date', 'status')
            ->withTimestamps();
    }
}