<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Foreign key column for user relationship
        'title', // Title of the post
        'content', // Content of the post
        // other attributes you want to include
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
