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
                <a href="{{route('manage-room.index')}}"> <i class="bi bi-x-lg"></i></a>
                <h3 class="card-title text-center mb-4"> Edit Room</h3>


                <form action="{{route('manage-room.update',$room->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $room->name) }}">
                        <div id="nameMessage" class="error-message"></div>
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <input type="text" name="description" id="description" class="form-control"   value="{{ old('description', $room->description) }}">
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" name="price" id="price" class="form-control"   value="{{ old('price', $room->price) }}">
                        @error('price')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="capacity" class="form-label">capacity</label>
                        <input type="text" name="capacity" id="capacity" class="form-control"   value="{{ old('capacity', $room->capacity) }}">
                        @error('capacity')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="amenities" class="form-label">amenities</label>
                        <input type="text" name="amenities" id="amenities" class="form-control"   value="{{ old('amenities', $room->amenities) }}">
                        @error('amenities')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <!-- <input type="text" name="status" id="status" class="form-control" > -->
                        <select name="status" id="status">
                            <option value="">select status </option>
                            <option value="available" {{$room->status == 'available' ? 'selected':''}}>available</option>
                            <option value="booked" {{$room->status=='booked' ? 'selected':''}}>booked</option>
                        </select>
                        @error('Status')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Room Image:</label>
                        <img id="output" class="h-25 w-25" src="{{asset('/storage/'.$room->image)}}" alt="room-image">
                        <input type="file" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])" name="image" id="image" class="form-control" accept="image/*">
                        @error('image')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100" name="add">update </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

