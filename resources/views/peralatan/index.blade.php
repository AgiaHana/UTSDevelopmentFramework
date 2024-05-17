@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2>List Peralatan</h2>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="pb-3">
            <a href="{{ url('peralatan/create') }}" class="btn btn-primary">+ Tambah Data</a>
        </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td>{{ $data->kode_alat }}</td>
                <td>{{ $data->nama_alat }}</td>
                <td>{{ $data->deskripsi }}</td>
                <td>
                            <a href="{{ url('peralatan/' . $data->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline"
                                action="{{ url('peralatan/' . $data->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
