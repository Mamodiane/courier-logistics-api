<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    //
    protected $fillable = [
        'tracking_number',
        'sender_name',
        'sender_phone',
        'receiver_name',
        'receiver_phone',
        'pickup_address',
        'delivery_address',
        'parcel_description',
        'weight',
        'status',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
