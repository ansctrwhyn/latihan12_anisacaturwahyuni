@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5">
        <h1>Edit Biodata</h1>
        <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" class="mt-5">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" value="{{ $biodata->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" name="nik" value="{{ $biodata->nik }}" required>
            </div>
            <div class="mb-3">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" name="umur" value="{{ $biodata->umur }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="{{ $biodata->alamat }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
@endsection