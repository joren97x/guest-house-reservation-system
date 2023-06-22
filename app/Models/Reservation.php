<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'user_id',
        'name',
        'address',
        'contact_no',
        'payment_process',
        'status',
    ];

    public function guest_house() {
        return $this->belongsTo(GuestHouses::class, 'room_id');
    }

}
