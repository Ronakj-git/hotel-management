<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Support\Facades\Auth\user     as  Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PharIo\Manifest\Email;






class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory , Notifiable;

    public $timestamps = false ;
    protected $guarded=[];

    public function bookings(){
        return $this->hasMany(Booking::class);
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}



