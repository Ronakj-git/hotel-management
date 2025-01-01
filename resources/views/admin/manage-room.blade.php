@extends('admin.header')

@section('content')
    <div class="container">
        <div class="table-responsive p-30">
            <table class="table class table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">image</th>
                        <th scope="col">name</th>
                        <!-- <th scope="col">description</th> -->
                        <th scope="col">price</th>
                        <th scope="col">capacity</th>
                        <th scope="col">amnities</th>
                        <th scope="col">operations</th>
                        <!-- <th scope="col">status </th> -->
                    </tr>
                </thead>
                @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td><img src="{{ asset('storage/' . $room->image) }}" alt="room-image" width="100px"></td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->price }}</td>
                        <td>{{ $room->capacity }}</td>
                        <td>{{ $room->amenities }}</td>
                        <td>
                            {{-- <form action="{{route('manage-room.destroy',$room->id)}}" method="post" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">delete</button>

        </form> --}}


                            <form action={{ route('manage-room.destroy', $room->id) }}" method="POST"
                                style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bi bi-trash btn btn-link"></button>

                            </form>
                            {{-- <a href="{{route('manage-room.edit',$room->id)}}"><button type="submit" class="btn btn-primary">Edit</button></a> --}}
                            <a href="{{ route('manage-room.edit', $room->id) }}" class="btn btn-link" title="Edit customer">
                                <i class="bi bi-pen"></i>
                            </a>
                        </td>
                @endforeach
                {{ $rooms->links() }} <!-- Renders pagination links -->
                <div class="mt-4">
                    @if (session('add-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">                            {{ session('add-success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    @endif
                    @if (session('update-success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">                            {{ session('update-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('delete-success'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">                            {{ session('delete-success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
        </div>
    @endsection
