<!-- resources/views/profile/edit.blade.php -->
@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2>Edit Profile Pengguna</h2>
    <form action="{{ route('profile.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $profile->nama }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}">
        </div>
        <div class="form-group">
            <label for="asal">asal:</label>
            <textarea class="form-control" id="asal" name="asal">{{ $profile->asal }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
