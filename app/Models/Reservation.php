<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Reservation
 *
 * @package App\Models
 * @mixin Eloquent
 */
class Reservation extends Model
{
    protected $fillable = [
        'user_id',
        'room_id',
        'num_of_guests',
        'arrival',
        'departure'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
