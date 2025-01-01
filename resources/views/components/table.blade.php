
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container">
    <div class="table-responsive p-30">
        <table class="table class table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                   @foreach ($columns as $column)
                        <th>{{ $column }}</th>
                   @endforeach
                </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)
            <tr>
                @foreach($row as $data)
                    {{-- <td>{{  $data  }}</td> --}}
                    <td>{!! $data !!}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
            </div>
    </div>

