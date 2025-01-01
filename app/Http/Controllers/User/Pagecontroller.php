<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function about(){
        return view('User.about');
    }

    public function contact(){
        return view('User.contact');
    }

    public function blog(){
        return view('User.blog');
    }
    public function restrauant(){
        return view('User.restaurant');
    }

    public function roomfilter(){
        return view('User.room-filter');
    }

}

