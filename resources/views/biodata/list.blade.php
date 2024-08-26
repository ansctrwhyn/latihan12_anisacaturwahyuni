@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5">
        <h1>List Biodata</h1>
        <table id="biodataTable" class="table table-striped table-bordered mt-5 mb-5">

            <thead>
                <tr>
                    <th class="text-center">Nama Lengkap</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Umur</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            @foreach ($biodata as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nik }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <div style="display: flex; gap: 10px;">
                            <a href="{{ route('biodata.edit', $item->id) }}"><button
                                    class="btn btn-warning btn-sm">Edit</button></a>
                            <form action="{{ route('biodata.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>

            @endforeach
        </table>
        <a href="{{ route('biodata.create') }}"><button class="btn btn-primary btn-sm">Add New
                Biodata</button></a>
    </div>
</body>
@endsection