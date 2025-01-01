@extends('admin.header')

@section('content')
    <div class="container">
        <div class="table-responsive p-30">
            <table class="table class table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">username</th>
                        <th scope="col">email</th>
                        <th scope="col">operations</th>
                    </tr>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('manage-customer.edit', $user->id) }}" class="btn btn-link"
                                title="Edit customer">
                                <i class="bi bi-pen"></i>
                            </a>
                            <form action="{{ route('manage-customer.destroy', $user->id) }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bi bi-trash btn btn-link"></button>
                            </form>
                        </td>
                    </tr>
                @endforeach


                {{ $users->links() }}
                <div class="mt-4">
                    @if (session('add-success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('add-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif
                    @if (session('update-success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('update-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif
                    @if (session('delete-success'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('delete-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                    @endif
                </div>

        </div>
    @endsection
