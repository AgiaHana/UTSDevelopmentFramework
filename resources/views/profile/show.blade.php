<!-- resources/views/profile/show.blade.php -->
@extends('layout.template')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h2>Detail Profile Pengguna</h2>
        <ul>
            <li><strong>Nama:</strong> {{ $profile->nama }}</li>
            <li><strong>Email:</strong> {{ $profile->email }}</li>
            <li><strong>asal:</strong> {{ $profile->asal }}</li>
        </ul>
        <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('profile.destroy', $profile->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"
                onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
        </form>
    </div>
@endsection
