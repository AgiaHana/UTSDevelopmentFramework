<!-- resources/views/profile/index.blade.php -->

@extends('layout.template')

@section('konten')
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <h2>Daftar Profile Pengguna</h2>
    <a href="{{ route('profile.create') }}" class="btn btn-primary mb-3">Tambah Profile</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>asal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($profiles as $profile)
            <tr>
                <td>{{ $profile->nama }}</td>
                <td>{{ $profile->email }}</td>
                <td>{{ $profile->asal }}</td>
                <td>
                    <a href="{{ route('profile.show', $profile->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('profile.destroy', $profile->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
