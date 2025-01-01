<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="card text-center shadow">
                    <!-- Profile Header -->
                    <div class="card-header bg-primary text-white">
                        <img src="user/images/facicon.png" alt="Profile Picture" class="rounded-circle img-thumbnail mb-3">
                        {{-- <h4 class="card-title">{{$user->username}}</h4> --}}
                        {{-- <p class="card-text">Role: {{$user->role}}</p> --}}
                    </div>
                    <!-- Profile Details -->
                    <form action="{{route('updateprofile',$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                    <div class="card-body">
                        <ul class="list-group list-group-flush mb-4">
                            <li class="list-group-item">

                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"  value="{{$user->username}}">
                            </li>
                            <li class="list-group-item">

                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" disabled value="{{$user->email}} ">
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
                            <button type="submit" class="btn btn-primary">update Profile</button>
                            <a href="{{route('profile')}}" class="btn btn-secondary">Cancel</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
