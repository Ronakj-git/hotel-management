@extends('admin.header')

@section('content')
    <div class="container">
        <div class="table-responsive p-30">
            <table class="table class table table-striped table-bordered">

                <div class="mt-4">
                    @if (session('success-confirm'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success-confirm') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('success-cancelation'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('success-cancelation') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>









                <form action="{{ route('booked-room.index') }}" method="GET" class="mb-4">
                    <div class="row m-2">
                        <!-- Date Range Filters -->
                        <div class="col-md-4">
                            <input type="date" name="from_date" id="from_date" class="form-control checkin_date"
                                value="{{ request('from_date') }}" placeholder="From Date">
                        </div>

                        <div class="col-md-4">
                            <input type="date" name="to_date" id="to_date" class="form-control checkout_date"
                                class="form-control checkout_date" value="{{ request('to_date') }}" placeholder="To Date">
                        </div>

                        <!-- Status Filter -->
                        <div class="col-md-4">
                            {{-- <label for="status">Status</label> --}}
                            <select name="status" id="status" class="form-control" placeholder="status">
                                <option value="">All</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="pending">Pending</option>
                                <option value="canceled">Canceled</option>
                            </select>
                        </div>
                    </div>

                    <div class="row m-3">
                        <div class="col">
                            <button type="submit" class="btn btn-primary ">Filter</button>
                            <a href="{{ route('booked-room.index') }}" class="btn btn-secondary">Clear</a>
                        </div>
                    </div>
                </form>




                {{ $bookings->links() }}

                <thead class="thead-dark">


                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Email</th>
                        <th scope="col">Room Name</th>
                        <th scope="col">price</th>
                        <th scope="col">people</th>
                        <th scope="col">Status</th>
                        <th scope="col">Booking Date</th>
                        <th scope="col">Actions</th>
                        <!-- <th scope="col">status </th> -->

                    </tr>
                </thead>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ optional($booking->user)->username }}</td>
                        <td>{{ optional($booking->user)->email }}</td>
                        <td>{{ $booking->room->name }}</td>
                        <td>{{ $booking->room->price }}</td>
                        <td>{{ $booking->people }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>


                            <a href="{{ route('booked-room.canceled', $booking->id) }}"
                                class="btn btn-link  danger text-danger" title="cancel booking">
                                <i class="bi bi-x-circle-fill "></i>
                            </a>

                            <a href="{{ route('booked-room.confirm', $booking->id) }}" class="btn btn-link"
                                title="confirm booking">
                                <i class="bi bi-check-circle-fill"></i>
                            </a>
                            {{-- <a href="{{ route('booked-room.edit', $booking->id) }}" class="btn btn-link" title="Edit Booking">
                    <i class="bi bi-pen"></i>
                </a> --}}
                        </td>

                    </tr>
                @endforeach


        </div>
    @endsection
