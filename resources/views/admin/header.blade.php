<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
    <link rel="icon" href="admin/assets/img/kaiadmin/favicon.ico" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Fonts and icons -->
    <script src="admin/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                families: ["Public Sans:300,400,500,600,700"]
            },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["admin/assets/css/fonts.min.css"],
            },
            active: function() {
                sessionStorage.fonts = true;
            },
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="admin/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="admin/assets/css/plugins.min.css" />
    <link rel="stylesheet" href="admin/assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="admin/assets/css/demo.css" />
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar" data-background-color="dark">
            <div class="sidebar-logo">
                <!-- Logo Header -->
                <div class="logo-header" data-background-color="dark">
                    <a href="index" class="logo">
                        <img src="admin/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                            height="20" />
                    </a>
                    <div class="nav-toggle">
                        <button class="btn btn-toggle toggle-sidebar">
                            <i class="gg-menu-right"></i>
                        </button>
                        <button class="btn btn-toggle sidenav-toggler">
                            <i class="gg-menu-left"></i>
                        </button>
                    </div>
                    <button class="topbar-toggler more">
                        <i class="gg-more-vertical-alt"></i>
                    </button>
                </div>
                <!-- End Logo Header -->
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item active">
                            <a href="{{route('dashboard')}}" class="collapsed" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-section">
                            <span class="sidebar-mini-icon">
                                <i class="fa fa-ellipsis-h"></i>
                            </span>
                            <h4 class="text-section">Components</h4>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('booked-room.index')}}">
                                <i class="fas fa-th-list"></i>
                                <p>Booked room</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manage-room.index')}}">
                                <i class="fas fa-pen-square"></i>
                                <p>Manage room </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manage-customer.index')}}">
                                <i class="fas fa-table"></i>
                                <p>Manage Customer </p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
        <!-- End Sidebar -->
        <div class="main-panel">
            <div class="main-header">
                <div class="main-header-logo">
                    <!-- Logo Header -->
                    <div class="logo-header" data-background-color="dark">
                        <a href="index.html" class="logo">
                            <img src="admin/assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                                height="20" />
                        </a>
                        <div class="nav-toggle">
                            <button class="btn btn-toggle toggle-sidebar">
                                <i class="gg-menu-right"></i>
                            </button>
                            <button class="btn btn-toggle sidenav-toggler">
                                <i class="gg-menu-left"></i>
                            </button>
                        </div>
                        <button class="topbar-toggler more">
                            <i class="gg-more-vertical-alt"></i>
                        </button>
                    </div>
                    <!-- End Logo Header -->
                </div>
                <!-- Navbar Header -->
                <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
                    <div class="container-fluid">
                        <nav
                            class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pe-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" placeholder="Search ..." class="form-control" />
                            </div>
                        </nav>
                        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                            <li class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none">
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#"
                                    role="button" aria-expanded="false" aria-haspopup="true">
                                    <i class="fa fa-search"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-search animated fadeIn">
                                    <form class="navbar-left navbar-form nav-search">
                                        <div class="input-group">
                                            <input type="text" placeholder="Search ..." class="form-control" />
                                        </div>
                                    </form>
                                </ul>
                            </li>



                                 {{-- add button conditionnaly on the page  --}}

                                 {{-- manage-room add button --}}
                                @if(Route::currentRouteName() == 'manage-room.index')
                               <a href="{{route('manage-room.create')}}"> <button type="submit" class="btn btn-primary">Add</button></a>
                                @endif

                                {{-- manage-customer add button --}}
                                @if(Route::currentRouteName() == 'manage-customer.index')
                                <a href="{{route('manage-customer.create')}}"> <button type="submit" class="btn btn-primary">Add</button></a>
                                 @endif

                                 {{-- book room for users --}}
                                 @if(Route::currentRouteName() == 'booked-room.index')
                                <a href="{{route('booked-room.create')}}"> <button type="submit" class="btn btn-primary">book</button></a>
                                 @endif

                            <li class="nav-item topbar-user dropdown hidden-caret">
                                <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#"
                                    aria-expanded="false">
                                    <div class="avatar-sm">
                                        <img src="admin/assets/img/profile.jpg" alt="..."
                                            class="avatar-img rounded-circle" />
                                    </div>
                                    <span class="profile-username">
                                        {{-- <span class="op-7">Hi,</span> --}}
                                        {{-- <span class="fw-bold">Hizrian</span> --}}
                                    </span>
                                </a>
                                <ul class="dropdown-menu dropdown-user animated fadeIn">
                                    <div class="dropdown-user-scroll scrollbar-outer">
                                        {{-- <li>
                                            <div class="user-box">
                                                <div class="avatar-lg">
                                                    <img src="admin/assets/img/profile.jpg" alt="image profile"
                                                        class="avatar-img rounded" />
                                                </div>
                                                <div class="u-text">
                                                    <h4>Hizrian</h4>
                                                    <p class="text-muted">hello@example.com</p>
                                                    <a href="profile.html"
                                                        class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </li> --}}
                                        <li>
                                            {{-- <div class="dropdown-divider"></div> --}}
                                            <a class="dropdown-item" href="{{route('adminprofile')}}">My Profile</a>
                                            <a class="dropdown-item" href="#">My Balance</a>
                                            <a class="dropdown-item" href="#">Inbox</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Account Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="{{route('user-logout')}}">Logout</a>


                                        </li>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End Navbar -->
            </div>

             <!--   Core JS Files   -->
            <script src="admin/assets/js/core/jquery-3.7.1.min.js"></script>
            <script src="admin/assets/js/core/popper.min.js"></script>
            <script src="admin/assets/js/core/bootstrap.min.js"></script>

            <!-- jQuery Scrollbar -->
            <script src="admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

            <!-- Chart JS -->
            {{-- <script src="admin/assets/js/plugin/chart.js/chart.min.js"></script> --}}
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


            <!-- jQuery Sparkline -->
            <script src="admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

            <!-- Chart Circle -->
            <script src="admin/assets/js/plugin/chart-circle/circles.min.js"></script>

            <!-- Datatables -->
            <script src="admin/assets/js/plugin/datatables/datatables.min.js"></script>

            <!-- Bootstrap Notify -->
            {{-- <script src="admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script> --}}

            <!-- jQuery Vector Maps -->
            <script src="admin/assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
            <script src="admin/assets/js/plugin/jsvectormap/world.js"></script>

            <!-- Sweet Alert -->
            <script src="admin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

            <!-- Kaiadmin JS -->
            <script src="admin/assets/js/kaiadmin.min.js"></script>

            <!-- Kaiadmin DEMO methods, don't include it in your project! -->
            <script src="admin/assets/js/setting-demo.js"></script>
            <script src="admin/assets/js/demo.js"></script>








            @yield('content')
