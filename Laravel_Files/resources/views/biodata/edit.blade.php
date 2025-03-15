@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Biodata</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Data</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-1"></i>
                Edit Biodata
            </div>
            <div class="card-body">
                <form action="{{ route('biodata.update', $biodata->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $biodata->nama }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $biodata->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ $biodata->alamat }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="foto">Foto:</label>
                        <input type="file" class="form-control" id="foto" name="foto">

                        @if (!empty($biodata->foto))
                            <img src="{{ url('image/' . $biodata->foto) }}" alt="Foto Biodata" class="rounded mt-2" style="width: 100px; height: auto;">
                        @else
                            <img src="{{ url('image/nophoto.jpg') }}" alt="No Foto" class="rounded mt-2" style="width: 100px; height: auto;">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
