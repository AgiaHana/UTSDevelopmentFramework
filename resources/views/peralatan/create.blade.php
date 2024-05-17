@extends('layout.template')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Tambah Data Peralatan</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('peralatan') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_alat" class="form-label">Nama Alat</label>
                <input type="text" class="form-control" id="nama_alat" name="nama_alat"
                    value="{{ Session::get('nama_alat') }}" required>
            </div>
            <div class="mb-3">
                <label for="kode_alat" class="form-label">Kode Alat</label>
                <input type="text" class="form-control" id="kode_alat" name="kode_alat"
                    value="{{ Session::get('kode_alat') }}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                    value="{{ Session::get('deskripsi') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
