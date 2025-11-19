<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'cnic',
        'role',
    ];

     protected $hidden = [
        'password',
        'remember_token',
    ];


     public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

     public function bookings()
    {
        return $this->hasMany(Booking::class, 'customer_id');
    }
}
