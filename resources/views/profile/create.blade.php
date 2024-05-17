<!-- resources/views/profile/create.blade.php -->
@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2>Tambah Profile Pengguna</h2>
    <form action="{{ route('profile.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="asal">Asal:</label>
            <textarea class="form-control" id="asal" name="asal"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
