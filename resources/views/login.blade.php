<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow" style="width: 100%; max-width: 500px;">

            <div class="card-body">
                {{-- <a href="{{route('manage-room.index')}}"> <i class="bi bi-x-lg"></i></a> --}}
                <h3 class="card-title text-center mb-4"> Login</h3>

                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                    </div>
                @endif

                @if (session('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                    </div>
                @endif

                @if (session('login-error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('login-error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>                    </div>
                @endif
                @if (session('logout-success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('logout-success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('adminlogin-error' ))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('adminlogin-error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif




                <form action="{{route('loginsave')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" name="email" id="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="text" name="password" id="password" class="form-control">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="add">login</button>

                    <p class="m-2">Don't have an account? <a href="{{ route('register') }}"> Sign up</a></p>
                    {{-- <a href="" class="btn btn-primary m-3 ">create account</a> --}}

                </form>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</body>

</html>
