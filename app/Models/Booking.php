<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'from',
        'from_lat',
        'from_long',
        'to',
        'to_lat',
        'to_long',
        'flight_no',
        'arrival_from',
        'airline',
        'meeting_point',
        'ship_name',
        'direction',
        'pickup_datetime',
        'return_datetime',
        'vehicle_type',
        'passenger',
        'large_cases',
        'small_cases',
        'payment_method',
        'phone',
        'name',
        'email',
        'instruction',
        'fare',
        'status',
    ];

    public function transaction() {
        return $this->hasOne("App\Models\Transaction");
    }
}
