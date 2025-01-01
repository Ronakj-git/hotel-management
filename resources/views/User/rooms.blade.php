@extends('User.layout')

@section('content')
    <div class="hero-wrap" style="background-image: url('user/images/bg_1.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
                <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
                    <div class="text">
                        <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home</a></span>
                            <span>About</span>
                        </p>
                        <h1 class="mb-4 bread">Rooms</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach ($rooms as $room)
                            <div class="col-sm col-md-3 col-lg-4 ftco-animate">

                                <div class="room">
                                    <a href="{{ route('room.show', $room->id) }}"
                                        class="img d-flex justify-content-center align-items-center"
                                        style="background-image: url('{{ asset('storage/' . $room->image) }}');">
                                        <div class="icon d-flex justify-content-center align-items-center">
                                            <span class="icon-search2"></span>
                                        </div>
                                    </a>
                                    <div class="text p-3 text-center">

                                        <h3 class="mb-3"><a href="user/rooms-single.html">{{ $room->name }}</a></h3>
                                        <p><span class="price mr-2">{{ $room->price }}</span> <span class="per">per
                                                night</span></p>
                                        <ul class="list">
                                            <li><span>Max:</span>{{ $room->capacity }}</li>
                                            <li><span>Size:</span> 45 m2</li>
                                            <li><span>View:</span> Sea View</li>
                                            <li><span>Bed:</span> 1</li>
                                        </ul>


                                        <!-- Check if dates are selected -->
                                        @if (isset($check_in_date) && isset($check_out_date))
                                            @if ($room->bookings->isEmpty())
                                                <a href="{{ route('book-room', [$room->id]) }}" class="btn-custom">Book Now
                                                    <span class="icon-long-arrow-right"></span>
                                                </a>
                                            @else
                                                <button class="book_now" disabled>Not Available</button>
                                            @endif
                                        @else
                                            <!-- If no dates are selected, show "Book Now" for all rooms -->
                                            <a href="{{ route('book-room', [$room->id]) }}" class="btn-custom">Book Now
                                                <span class="icon-long-arrow-right"></span>
                                            </a>
                                        @endif


                                        {{-- <a href="{{ route('book-room', ['room' => $room->id]) }}" class="book_now">Book
                                            Now</a> --}}



                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>



                <div class="col-lg-3 sidebar">
                    <div class="sidebar-wrap bg-light ftco-animate">
                        <h3 class="heading mb-4">Advanced Search</h3>
                        <form action="{{ route('room-filter') }}" method="GET">
                            @csrf
                            <div class="fields">
                                <div class="form-group">
                                    <input type="text" name="check_in_date" id="check_in_date"
                                        class="form-control checkin_date" value="{{ old('check_in_date') }}"
                                        placeholder="Check In Date">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="check_out_date" id="check_out_date"
                                        class="form-control checkin_date" class="form-control checkout_date"
                                        value="{{ old('check_out_date') }}" placeholder="Check Out Date">
                                </div>

                                <div class="form-group">
                                    {{-- <input type="submit" value="Search" class="btn btn-primary py-3 px-5"> --}}
                                    <button type="submit" class="btn btn-primary py-3 px-5">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <div class="form-group">
                                    <div class="select-wrap one-third">
                                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                        <select name="" id="" class="form-control">
                                            <option value="">Room Type</option>
                                            <option value="">Suite</option>
                                            <option value="">Family Room</option>
                                            <option value="">Deluxe Room</option>
                                            <option value="">Classic Room</option>
                                            <option value="">Superior Room</option>
                                            <option value="">Luxury Room</option>
                                        </select>
                                    </div>
                                </div> --}}
    {{-- <div class="form-group">
                        <div class="select-wrap one-third">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                                <option value="">0 Adult</option>
                                <option value="">1 Adult</option>
                                <option value="">2 Adult</option>
                                <option value="">3 Adult</option>
                                <option value="">4 Adult</option>
                                <option value="">5 Adult</option>
                                <option value="">6 Adult</option>
                            </select>
                        </div>
                    </div> --}}
    {{-- <div class="form-group">
                        <div class="select-wrap one-third">
                            <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                            <select name="" id="" class="form-control">
                                <option value="">0 Children</option>
                                <option value="">1 Children</option>
                                <option value="">2 Children</option>
                                <option value="">3 Children</option>
                                <option value="">4 Children</option>
                                <option value="">5 Children</option>
                                <option value="">6 Children</option>
                            </select>
                        </div>
                    </div> --}}
    {{-- <div class="form-group">
                        <div class="range-slider">
                            <span>
                                <input type="number" value="25000" min="0" max="120000" /> -
                                <input type="number" value="50000" min="0" max="120000" />
                            </span>
                            <input value="1000" min="0" max="120000" step="500" type="range" />
                            <input value="50000" min="0" max="120000" step="500" type="range" />
                            </svg>
                        </div>
                    </div> --}}

    {{-- <div class="sidebar-wrap bg-light ftco-animate">
            <h3 class="heading mb-4">Star Rating</h3>
            <form method="post" class="star-rating">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                    class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                    class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                    class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span>
                        </p>
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i
                                    class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span>
                        </p>
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i
                                    class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span>
                        </p>
                    </label>
                </div>
            </form>
        </div> --}}



    <section class="instagram pt-5">
        <div class="container-fluid">
            <div class="row no-gutters justify-content-center pb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <h2><span>Instagram</span></h2>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="user/images/insta-1.jpg" class="insta-img image-popup"
                        style="background-image: url(user/images/insta-1.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="user/images/insta-2.jpg" class="insta-img image-popup"
                        style="background-image: url(user/images/insta-2.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="user/images/insta-3.jpg" class="insta-img image-popup"
                        style="background-image: url(user/images/insta-3.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="user/images/insta-4.jpg" class="insta-img image-popup"
                        style="background-image: url(user/images/insta-4.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md ftco-animate">
                    <a href="user/images/insta-5.jpg" class="insta-img image-popup"
                        style="background-image: url(user/images/insta-5.jpg);">
                        <div class="icon d-flex justify-content-center">
                            <span class="icon-instagram align-self-center"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>



    {{-- <div class="mt-4">
        @if(session('add-success'))
            <div class="alert alert-success">
                {{ session('add-success') }}
            </div>
        @endif --}}





    <!-- loader -->
    {{-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div> --}}


    </body>

    </html>
@endsection
