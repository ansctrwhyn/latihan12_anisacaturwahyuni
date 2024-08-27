@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5">
        @csrf
        <h1>Create Biodata</h1>
        <form action="{{ route('biodata.store') }}" method="POST" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" name="nik" value="{{ old('nik') }}" required>
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" name="umur" value="{{ old('umur') }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
@endsection