@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-6">
            @auth
                <h3>List Produk</h3>
                <p>Hi saya {{ auth()->user()->name }}</p>
                <table id="biodataTable" class="table table-striped table-bordered mt-5 mb-5">
                    <thead>
                        <tr>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Produk ID</th>
                            <th class="text-center">Harga Asli</th>
                            <th class="text-center">Harga Diskon</th>
                            <th class="text-center">Created at</th>
                            <th class="text-center">Updated at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $kategori)
                            @foreach ($products as $produk)
                                @if ($produk['category_id'] == $kategori['id'])
                                    <tr>
                                        <td>{{ $produk['name'] }}</td>
                                        <td>{{ $produk['id'] }}</td>
                                        <td>{{ $produk['price'] }}</td>
                                        <td>{{ $produk['harga_diskon'] }}</td>
                                        <td>{{ $produk['created_at'] }}</td>
                                        <td>{{ $produk['updated_at'] }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @endauth
            @guest
                <p>Harap login dahulu!</p>
            @endguest
        </div>
        <div class="col-6">
            @include('admin.formkategori')
        </div>
    </div>
</div>
@endsection