<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'phone_number',
        'address',
        'seat_number',
        'payment_method',
        'journey_id',
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
