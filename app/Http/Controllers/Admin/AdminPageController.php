<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{

    public function dashboard(){
        if(Auth::check()){
        return view('admin.index');
        }else{
            return redirect()->route('login')->with('adminlogin-error','First log-in');
        }
    }

    // public function manageRoom(){
    //     $rooms = Room::all();
    //     return view('admin.manage-room',compact('rooms'));
    // }

    public function bookedRoom(){
        return view('admin.booked-room');
    }

    public function manageCustomer(){
        return view('admin.manage-customer');
    }


    public function sample()
    {
        $rooms = Room::all()->map(function ($room) {
            return [
                'id' => $room->id,
                'name' => $room->name,
                'price' => $room->price,
                'capacity' => $room->capacity,
                'amenities' => $room->amenities,
                'image' => '<img src="' . asset('storage/' . $room->image) . '" alt="room-image" width="100px">',
                'operations' => '
                <a href="' . route('manage-room.edit', $room->id) . '" class="btn btn-sm btn-primary">Edit</a>
                <form action="' . route('manage-room.destroy', $room->id) . '" method="POST" style="display:inline;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                </form>
            ',
            ];
        });

        return view('admin.sample', [
            'columns' => ['ID', 'Name', 'Price', 'Capacity', 'Amenities', 'Image', 'Operations'],
            'rows' => $rooms,
        ]);
    }


}
