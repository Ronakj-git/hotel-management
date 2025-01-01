<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class authenticateController extends Controller
{
    public function register()
    {

        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function registersave(Request $request)
    {

        $data = $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            // 'password' => $data['password'],
        ]);
        // $user->sendEmailVerificationNotification();

        Mail::to($user->email)->send(new WelcomeEmail($user));

        if ($user) {
            return redirect()->route('login')->with('success', 'registered successfully');
        } else {
            return redirect()->back()->with('error', 'registration failed');
        }
    }

    public function loginsave(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);



        if (Auth::attempt($credentials)) {

            $user = Auth::user();



            $role = Auth::user()->role;
            if ($role == 'admin') {
                return redirect()->route('dashboard')->with('success', 'logged in successfully');
            } else {
                return redirect()->route('homee')->with('login-success', 'logged in successfully');
            }
        } else {
            return redirect()->back()->with('login-error', 'invalid credentials');
            // $user->hasVerifiedEmail();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout-success', 'logged out successfully');
    }


    //user profile

    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));

    }

    public function editprofile()
    {
        $user = Auth::user();

        return view('user.editprofile', compact('user'));
    }

    public function updateprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'username' => $request->input('name'),
        ]);
        return redirect()->route('profile')->with('success', 'profile updated successfully');
    }


    //admin profile

    public function adminprofile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function editadminprofile()
    {
        $user = Auth::user();

        return view('admin.editadminprofile', compact('user'));
    }

    public function updateadminprofile(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'username' => $request->input('name'),
        ]);
        return redirect()->route('adminprofile')->with('success', 'profile updated successfully');
    }
}
