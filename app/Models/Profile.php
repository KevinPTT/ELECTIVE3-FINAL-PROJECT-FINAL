<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Foreign key column for user relationship
        'first_name',
        'last_name',
        'birthdate',
        'address',
        // other attributes you want to include
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
