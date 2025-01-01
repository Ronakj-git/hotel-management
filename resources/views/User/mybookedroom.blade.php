<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>


    @guest
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <p> You Have Not Yet Login </p>
                        </div>
                        <div class="card-body">
                            <p>Please First Login </p>
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endguest

    @auth

        <body>
            <h1 class="m-2">Booked rooms</h1>
            @if (session('success-cancelation'))
                <div class="alert alert-danger">
                    {{ session('success-cancelation') }}
                </div>
            @endif
            <table class="border-box">
                <tr>
                    <div class="table-responsive m-2">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Room Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>total people</th>
                                    <th>Status</th>
                                    <th>Booking Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookedroom as $bookedroom)
                                    <div>
                                        <tr>
                                            <td>{{ $bookedroom->room->name }}</td>
                                            <td>{{ $bookedroom->room->description }}</td>
                                            <td>{{ $bookedroom->room->price }}</td>
                                            <td>{{ $bookedroom->adults + $bookedroom->children }}</td>
                                            <td>{{ $bookedroom->status }}</td>
                                            <td>{{ $bookedroom->booking_date }}</td>
                                            <td>
                                                <a href="{{ route('bookedroomcanceled', $bookedroom->id) }}"
                                                    class="btn btn-link  danger text-danger" title="cancel booking">
                                                    <i class="bi bi-x-circle-fill "></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
        </body>
    @endauth

</html>
