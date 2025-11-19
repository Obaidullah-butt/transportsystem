<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

       protected $fillable = [
        'customer_id',
        'vehicle_id',
        'booking_date',
        'pickup_location',
        'dropoff_location',
        'status',
    ];

    // Relation: Booking kis user ne ki
    public function customer()
    {
        return $this->belongsTo(Userr::class, 'customer_id');
    }

    // Relation: Konsi vehicle book hui
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }   

   
}
