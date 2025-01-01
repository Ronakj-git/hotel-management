<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Hamcrest\Description;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $rooms = Room::simplepaginate(5);
            return view('admin.manage-room',compact('rooms'));
            }else{
                return redirect()->route('login')->with('adminlogin-error','First log-in');
            }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-room');
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'amenities' => 'nullable|string',
            'status' => 'required|in:available,booked',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

        $path = $request->image->store('image','public');
        // $path = $req->photo->store('image','public');

        $rooms=Room::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'capacity'=>$request->capacity,
            'amenities'=>$request->amenities,
            'status'=>$request->status,
            'image'=>$path


        ]);
        if($rooms){
            return redirect('manage-room')
             ->with('add-success', 'room added successfully!');

        }else{
            echo "added unsuccessfull";
        }
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
    public function edit(string $id)
    {
        $room=Room::find($id);
        return view('admin.edit-room',compact('room'));

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
        $room=Room::find($id);

         // Validate input
         $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'capacity' => 'required|integer',
            'amenities' => 'nullable|string',
            'status' => 'required|in:available,booked',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
         ]);

        if($request->hasfile('image')){

            $image_path = public_path("storage/").$room->image;
            if(file_exists($image_path)){
                @unlink($image_path);
            }

            $path=$request->image->store('image','public');
            $room->image=$path;
        }
        $room ->update([
                'name'=>$request->name,
                'description'=>$request->description,
                'price'=>$request->price,
                'capacity'=>$request->capacity,
                'amenities'=>$request->amenities,
                'status'=>$request->status,
                // 'image'=>$path
        ]);
        return redirect()->route('manage-room.index')
        ->with('update-success','room updated successfull');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rooms=Room::find($id);
        $image_path= public_path("storage/"). $rooms->image;


        if(file_exists($image_path)){
            @unlink($image_path);
        }

        $rooms->delete();
        return redirect()->back()->with('delete-success','room deleted successfull');

    }


    public function roomcanceled(string $id){
        $room = Booking::where('id', $id)
        ->update([
            'status' => 'canceled'
            ]);
            return redirect()->route('booked-room.index')
            ->with('success-cancelation', 'Room canceled successfully!');


    }

    public function roomconfirm(string $id){

        $room = booking::where('id', $id)
        ->update([
            'status' => 'confirmed'
            ]);
            return redirect()->route('booked-room.index')
            ->with('success-confirm', 'Room confirmed successfully!');
    }

}






