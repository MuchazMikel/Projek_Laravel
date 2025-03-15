@extends('layouts.main')

@section('title', 'Homepage')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Welcome to the Homepage</h1>

    <!-- Biodata Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h2>List Biodata</h2>
        </div>
        <div class="card-body">
            @if ($biodata->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biodata as $bio)
                            <tr>
                                <td>{{ $bio->nama }}</td>
                                <td>{{ $bio->email }}</td>
                                <td>{{ $bio->alamat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No Biodata available.</p>
            @endif
        </div>
    </div>

    <!-- Produk Section -->
    <div class="card mt-4">
        <div class="card-header">
            <h2>List Produk</h2>
        </div>
        <div class="card-body">
            @if ($produk->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $k)
                            <tr>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->jenis }}</td>
                                <td>Rp {{ number_format($k->harga_jual, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($k->harga_beli, 0, ',', '.') }}</td>
                                <td>
                                    @if ($k->foto && file_exists(public_path('image/' . $k->foto)))
                                        <img src="{{ asset('image/' . $k->foto) }}" alt="Produk Image" width="50">
                                    @else
                                        <img src="{{ asset('image/nophoto.jpg') }}" alt="No Image" width="50">
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No products available.</p>
            @endif
        </div>
    </div>
</div>
@endsection