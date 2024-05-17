@extends('layout.template')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Tambah Data Peminjaman</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('peminjaman') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="kode_alat" class="form-label">Kode Alat</label>
                <input type="text" class="form-control" id="kode_alat" name="kode_alat"
                    value="{{ Session::get('kode_alat') }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" id="nama_peminjam" name="nama_peminjam"
                    value="{{ Session::get('nama_peminjam') }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                    value="{{ Session::get('tanggal_pinjam') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
