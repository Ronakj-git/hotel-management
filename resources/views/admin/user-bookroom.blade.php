<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>



    <div class="d-flex justify-content-center align-items-center" style="height: 800px;">
        <div class="card" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <div class="d-flex">
                    <h4 class="mt-3">Booking Form</h4>
                    <a href="{{route('booked-room.index')}}" class="ms-auto me-3 mt-3">
                        <i class="bi bi-arrow-left-circle-fill fs-3"></i>
                    </a>
                </div>

                <form action="{{route('booked-room.store')}}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    <!-- Select User -->

                    <div class="mb-3">
                        <label for="user" class="form-label">Select user:</label>
                        <select name="user_id" id="user" class="form-select" style="outline: 2px solid #333;">
                            <option value="" disabled selected>Choose a user</option>
                            @foreach ($user as $user )
                            <option value="{{$user->id}}">{{$user->username}}</option>
                            @endforeach
                        </select>
                    </div>





    <!-- Check-In Date -->
    <div class="mb-3">
        <label for="check_in_date" class="form-label">Check-In Date</label>
        <input type="date" name="check_in_date" id="check_in_date" class="form-control"
            style="outline: 2px solid #333;">
    </div>

    <!-- Check-Out Date -->
    <div class="mb-3">
        <label for="check_out_date" class="form-label">Check-Out Date</label>
        <input type="date" name="check_out_date" id="check_out_date" class="form-control"
            style="outline: 2px solid #333;">
    </div>

    <!-- Select Room -->

    <div class="mb-3">
        <label for="room" class="form-label">Select Room:</label>
        <select name="room_id" id="room" class="form-select" style="outline: 2px solid #333;">
            <option value="" disabled selected>Choose a room</option>
            @foreach ($room as $room )
            <option value="{{$room->id}}">{{$room->name}}</option>
            @endforeach

        </select>
    </div>

    <!-- Full Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" id="name" class="form-control" style="outline: 2px solid #333;">
    </div>

    <!-- Mobile Number -->
    <div class="mb-3">
        <label for="mobile" class="form-label">Mobile</label>
        <input type="text" name="mobile" id="mobile" class="form-control" style="outline: 2px solid #333;">
    </div>

    <!-- Number of Adults -->
    <div class="mb-3">
        <label for="adults" class="form-label">Adults</label>
        <input type="number" name="adults" id="adults" class="form-control" style="outline: 2px solid #333;">
    </div>

    <!-- Number of Children -->
    <div class="mb-3">
        <label for="children" class="form-label">Children</label>
        <input type="number" name="children" id="children" class="form-control" style="outline: 2px solid #333;">
    </div>

    <button type="submit" class="btn btn-primary" name="book">Book Now</button>
    </form>
    </div>
    </div>
    </div>
</body>

</html>
