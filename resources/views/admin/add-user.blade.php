<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow" style="width: 100%; max-width: 500px;">

            <div class="card-body">
                <a href="{{route('manage-customer.index')}}"> <i class="bi bi-x-lg"></i></a>
                <h3 class="card-title text-center mb-4">Add user</h3>


                <form action="{{route('manage-customer.store')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">UserName:</label>
                        <input type="text" name="username" id="username" class="form-control">
                        {{-- <div id="nameMessage" class="error-message"></div> --}}
                        @error('username')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

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

                    <div class="mb-3">
                        <label for="role" class="form-label">Role:</label>
                        <select name="role" id="role" class="form-select">
                            <option value="" >select role</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                            <option value="receptionist">receptionist</option>
                        </select>
                        @error('role')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary w-100" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
