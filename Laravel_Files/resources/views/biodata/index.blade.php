@extends('layouts.main')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Biodata List</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Biodata</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <a href="{{ route('biodata.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Foto</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($biodata as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->email }}</td>
                                <td>{{ $k->alamat }}</td>
                                <td>
                                    @if ($k->foto)
                                        <img src="{{ url('image/' . $k->foto) }}" alt="Foto Biodata" class="rounded" style="width: 100px; height: auto;">
                                    @else
                                        <img src="{{ url('image/nophoto.jpg') }}" alt="No Foto" class="rounded" style="width: 100px; height: auto;">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('biodata.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $k->id }}">
                                        Hapus
                                    </button>

                                    <!-- Modal Hapus -->
                                    <div class="modal fade" id="modalHapus{{ $k->id }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus Biodata</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah Anda yakin ingin menghapus {{ $k->nama }}?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('biodata.destroy', $k->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
