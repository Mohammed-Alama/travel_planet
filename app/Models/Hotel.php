<?php

namespace App\Models;
use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Hotel
 *
 * @package App\Models
 * @mixin Eloquent
 */
class Hotel extends Model
{
    public $timestamps = false;

    protected $fillable =[
        'name',
        'location',
        'description',
        'image'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
