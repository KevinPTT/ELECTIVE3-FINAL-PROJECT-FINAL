<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journey extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'origin', 'destination', 'booking_date', 'date', 'time', 'vehicle_type', 'price', 'available_seats', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function journeyDetails()
    {
        return $this->hasOne(Journey::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }




}
