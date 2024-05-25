<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'journey_id',
        'rating',
        'comment',
        'date',
    ];

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with Journey model
    public function journey()
    {
        return $this->belongsTo(Journey::class);
    }
}
