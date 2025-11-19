<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'vehicle_number',
    'chassis_number',
    'vehicle_type',
    'can_carry',
    'weight_capacity',
    'status',
    'is_booked',
     'vehicle_image',
    'smartcard_image',
];



    // 1. Har vehicle kisi ek service provider (user) ka hota hai
public function user()
{
    return $this->belongsTo(Userr::class);
}
}
