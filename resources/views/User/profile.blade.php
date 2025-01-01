<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Profile Section</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

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
    {{-- hello --}}




    @auth
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card text-center shadow">
                        <!-- Profile Header -->
                        <div class="card-header bg-primary text-white">
                            <img src="user/images/facicon.png" alt="Profile Picture"
                                class="rounded-circle img-thumbnail mb-3">
                            {{-- <h4 class="card-title">{{$user->username}}</h4> --}}
                            {{-- <p class="card-text">Role: {{$user->role}}</p> --}}
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif




                        <!-- Profile Details -->
                        <div class="card-body">
                            <ul class="list-group list-group-flush mb-4">
                                <li class="list-group-item">
                                    <strong>Name:</strong> {{ $user->username }}
                                </li>
                                <li class="list-group-item">
                                    <strong>Email:</strong> {{ $user->email }}
                                </li>
                                {{-- <li class="list-group-item">
                                <strong>Phone:</strong>
                            </li>
                            <li class="list-group-item">
                                <strong>Address:</strong>
                            </li> --}}
                            </ul>
                            <!-- Profile Actions -->
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('editprofile') }}"><button class="btn btn-primary">Edit
                                        Profile</button></a>
                                {{-- <a href="{{route('logout')}}"> <button class="btn btn-danger"> Logout</button></a> --}}
                                <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
