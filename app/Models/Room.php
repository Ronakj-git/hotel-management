<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Room extends Model
{
    use HasFactory;

    public $timestamps = false ;
    protected $guarded=[];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
