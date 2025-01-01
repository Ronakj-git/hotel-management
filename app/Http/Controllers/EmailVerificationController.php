<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
     // Show the email verification notice
     public function notice()
     {
         return view('verify-email');
     }

     // Handle email verification
     public function verify(EmailVerificationRequest $request)
     {
         $request->fulfill(); // Mark the email as verified
         return redirect('/home'); // Redirect to dashboard or any route
     }

     // Resend the verification email
     public function resend(Request $request)
     {
         $request->user()->sendEmailVerificationNotification();

         return back()->with('message', 'Verification email resent!');
     }
 }
