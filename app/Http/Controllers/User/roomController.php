<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $rooms = Room::all();
            return view("User.rooms", compact('rooms'));
        }else{
            return redirect()->route('login')->with('message','Please ! First Log-in');
        }

    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        $room = Room::find($id);
        // return $room;
        return view("User.rooms-single", compact('room'));
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


    public function home()
    {
        $rooms = Room::all();
        return view('User.index', compact('rooms'));
    }


    public function roomfilter(Request $request)
    {

        $check_in_date = $request->input('check_in_date');
        $check_out_date = $request->input('check_out_date');
        // $room_name = $request->input('room_name');

        // Convert the dates to 'Y-m-d' format before applying the filter
        if ($check_in_date && $check_out_date) {
            $check_in_date = Carbon::parse($check_in_date)->format('Y-m-d');
            $check_out_date = Carbon::parse($check_out_date)->format('Y-m-d');
        }

        $rooms = Room::with(['bookings' => function ($query) use ($check_in_date, $check_out_date) {
            $query->where(function ($query) use ($check_in_date, $check_out_date) {
                $query->where('check_in_date', '<', $check_out_date)
                      ->where('check_out_date', '>', $check_in_date)
                      ->where('status', '!=', 'canceled');
            });
        }])
        ->get();

        // Filter rooms to check if they are available
        $availableRooms = $rooms->filter(function ($room) use ($check_in_date, $check_out_date) {
            return !$room->bookings->count();
        });

        // dd($query);
        return view("User.rooms",compact('rooms','check_in_date','check_out_date'));
    }

    public function bookroom(string $id){
        $room = Room::find($id);
        return view('User.book-room',compact('room'));
    }

        public function bookedroom(Request $request)
        {
            $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'name' => 'required|string|max:255',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'mobile' => 'required|string|max:15',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        $check_in_date = Carbon::parse($validated['check_in_date'])->format('Y-m-d');
        $check_out_date = Carbon::parse($validated['check_out_date'])->format('Y-m-d');
        $room_id = $validated['room_id'];

        // Check availability
        $isBooked = Booking::where('room_id', $room_id)
            ->where(function ($query) use ($check_in_date, $check_out_date) {
                $query->where('check_in_date', '<', $check_out_date)
                    ->where('check_out_date', '>', $check_in_date);
            })
            ->exists();

        if ($isBooked) {
            return back()->withErrors(['error' => 'The room is not available for the selected dates. Please choose another date or room.']);
        }

        // If available, create booking
        Booking::create([
            'user_id' => auth()->id(),
            'room_id' => $room_id,
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'adults' => $validated['adults'],
            'children' => $validated['children'],
            'check_in_date' => $validated[$check_in_date],
            'check_out_date' => $validated[$check_out_date],
        ]);

        return redirect()->route('room.index')->with('success', 'Room booked successfully!');
}







        public function mybookedroom(){
            $bookedroom = booking::with('room')
            ->where('user_id', auth()->id())
            ->get();
            return view('user.mybookedroom', compact('bookedroom'));

        }


        public function bookedroomcanceled(string $id){
            $room = booking::where('id', $id)
            ->update([
                'status' => 'canceled'
                ]);
                return redirect()->route('mybookedroom')
                ->with('success-cancelation', 'Room canceled successfully!');


        }
    }

