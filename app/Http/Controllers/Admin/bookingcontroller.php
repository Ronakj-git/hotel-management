<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bookingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if (Auth::check()) {

            $query = Booking::query();

            // Eager load related room and user data
            $query->with('room', 'user');

            // Apply Date Range Filter
            if ($request->has('from_date') && $request->has('to_date')) {
                $query->whereBetween('check_in_date', [$request->from_date, $request->to_date]);
            }

            // Apply Status Filter
            if ($request->filled('status')) {
                $query->where('status', $request->status);
            }

            // Get the filtered bookings
            $bookings = $query->simplePaginate(5);

            return view('admin.booked-room', compact('bookings'));
        } else {
            return redirect()->route('login')->with('adminlogin-error', 'First log-in');
        }



        // $bookings=Booking::with('user','room')->get();
        // // dd($bookings);
        // return view('admin.booked-room', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $room=Room::all();
        $user=User::where('role','user')->get();
        // return $user;
        return view('admin.user-bookroom',compact('room','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id'=>'required',
            'check_in_date'=>'required',
            'check_out_date'=>'required',
            'room_id'=>'required',
            'name'=>'required',
            'mobile'=>'required',
            'adults'=>'required',
            'children'=>'required',
           
            ]);

            $booking= Booking::create([
                'user_id'=>$request->user_id,
                'check_in_date'=>$request->check_in_date,
                'check_out_date'=>$request->check_out_date,
                'room_id'=>$request->room_id,
                'name'=>$request->name,
                'mobile'=>$request->mobile,
                'adults'=>$request->adults,
                'children'=>$request->children,


            ]);

            return redirect()->route('booked-room.index')->with('success','Booking created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
