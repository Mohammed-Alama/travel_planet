<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
/**
 * Class Room
 *
 * @package App\Models
 * @mixin Eloquent

 */
class Room extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'hotel_id',
        'type',
        'description',
        'price',
        'image'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}
