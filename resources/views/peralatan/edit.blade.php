@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2>Edit Data Peralatan</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ url('peralatan/'.$data->id) }}" method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="kode_alat" class="form-label">Kode Alat</label>
            <input type="text" class="form-control" id="kode_alat" name="kode_alat" value="{{ $data->kode_alat }}" required>
        </div>
        <div class="mb-3">
            <label for="nama_alat" class="form-label">Nama Alat</label>
            <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="{{ $data->nama_alat }}" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $data->deskripsi }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
