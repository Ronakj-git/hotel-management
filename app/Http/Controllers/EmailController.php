<?php

namespace App\Http\Controllers;

use App\Mail\welcomeemail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail ="";
        $message="hello , welcome to our website ";
        $subject = "Test Email";

        Mail::to($toEmail)->send(new welcomeemail(
            $message,$subject));
    }
}
