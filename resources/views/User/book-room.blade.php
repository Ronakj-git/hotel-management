<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <a href="{{route('room.index')}}"><i class="bi bi-arrow-left fs-3"></i></a>
        <h3 class="text-center">Book {{$room->name}}</h3>


        <div class="row">
            <div class="col-md-6">
                <td><img src="{{asset('storage/'.$room->image) }}" alt="room-image" width="300px"</td>

            </div>
            <div class="col-md-6">
                <h2></h2>
                <h4>Room Details</h4>
                <p><strong>Price:</strong> {{$room->price}} per night</p>
                <p><strong>Description:</strong> {{$room->description}} </p>
                <p><strong>Amenities:</strong> {{$room->amenities}} </p>
                <p><strong>Capacity:</strong> {{$room->capacity}} persons</p>
            </div>
        </div>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h4 class="mt-4">Booking Form</h4>
        <form action="{{route('store-bookroom',$room->id)}}" method="POST">
            @csrf
            <input type="hidden" name="room_id" value="{{ $room->id }}">

            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="adults" class="form-label">adult</label>
                <input type="number" name="adults" id="adults" class="form-control">
            </div>
            <div class="mb-3">
                <label for="children" class="form-label">children</label>
                <input type="number" name="children" id="children" class="form-control">
            </div>

            <div class="mb-3">
                <label for="mobile" class="form-label">mobile</label>
                <input type="text" name="mobile" id="mobile" class="form-control">
            </div>
            <div class="mb-3">
                <label for="check_in_date" class="form-label">Check-In Date</label>
                <input type="date" name="check_in_date" id="check_in_date" class="form-control">
            </div>
            <div class="mb-3">
                <label for="check_out_date" class="form-label">Check-Out Date</label>
                <input type="date" name="check_out_date" id="check_out_date" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="book">Book Now</button>
        </form>
    </div>
