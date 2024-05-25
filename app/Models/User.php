<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    // public function roles(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class);
    // }

    // public function hasRole($role)
    // {
    //     return $this->roles()->where('name', $role)->exists();
    // }

    public function getFullNameAttribute()
{
    return "{$this->first_name} {$this->last_name}";
}

    public function getRoleAttribute()
    {
        return $this->attributes['role'];
    }

    public function setRoleAttribute($value)
    {
        $this->attributes['role'] = strtolower($value);
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function admin()
    {
        // Only users with the 'admin' role can access this method.
        $user = User::find(1);

        if ($user->hasRole('admin')) {
            return view('admin.dashboard');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function customerSupports()
{
    return $this->hasMany(CustomerSupport::class);
}
public function feedbacks()
{
    return $this->hasMany(Feedback::class);
}


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'email', 'phone_number', 'address', 'password', 'role',
    ];

    public function journeys()
    {
        return $this->hasMany(Journey::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


}
