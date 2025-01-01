<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Deluxe - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{asset('user/https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet')}}">
    <link href="{{asset('user/https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet')}}">

    <link rel="stylesheet" href="{{asset('user/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('user/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('user/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Deluxe</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="{{route('room.index')}}" class="nav-link">Rooms</a></li>
	          {{-- <li class="nav-item"><a href="{{route('restaurant')}}" class="nav-link">Restaurant</a></li> --}}
	          <li class="nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
	          {{-- <li class="nav-item"><a href="{{route('blog')}}" class="nav-link">Blog</a></li> --}}
	          <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
              <li class="nav-item text-primary "> <a href="" class="  "></a></li>
              {{-- <div class="profile-dropdown"> --}}

                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-square text-dark" style="font-size: 20px; color: #fff;"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="{{route('profile')}}">My Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('mybookedroom')}}">My Booked rooms</a></li>
                        <li><a class="dropdown-item" href="#">Inbox</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Account Setting</a></li>
                        @auth
                        <li><a class="dropdown-item" href="{{route('user-logout')}}">Logout</a></li>
                        @endauth
                        @guest
                        <li><a class="dropdown-item" href="{{route('login')}}">login</a></li>
                        @endguest

                    </ul>
                </li>



	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div >
        @yield('content')
    </div>



  <script src="{{asset('user\js\jquery.min.js')}}"></script>
  <script src="{{asset('user\js\jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('user/js/popper.min.js')}}"></script>
  <script src="{{asset('user/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('user/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('user/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('user/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('user/js/aos.js')}}"></script>
  <script src="{{asset('user/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('user/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('user/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('user/js/scrollax.min.js')}}"></script>
  <script src="{{asset('user/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false')}}"></script>
  <script src="{{asset('user/js/google-map.js')}}"></script>
  <script src="{{asset('user\js\main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Deluxe Hotel</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Useful Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Blog</a></li>
                            <li><a href="#" class="py-2 d-block">Rooms</a></li>
                            <li><a href="#" class="py-2 d-block">Amenities</a></li>
                            <li><a href="#" class="py-2 d-block">Gift Card</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Privacy</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Career</a></li>
                            <li><a href="#" class="py-2 d-block">About Us</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
                                        View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392
                                            3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@yourdomain.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i
                            class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
                            target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>
