@extends('layout.template')

@section('konten')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="pb-3">
            <a href="{{ url('peminjaman/create') }}" class="btn btn-primary">+ Tambah Data</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Alat</th>
                    <th>Nama Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstItem(); ?>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->kode_alat }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->tanggal_pinjam }}</td>
                        <td>{{ $item->tanggal_kembali }}</td>
                        <td>
                            <a href="{{ url('peminjaman/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline"
                                action="{{ url('peminjaman/' . $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        {{ $data->links() }}
    </div>
@endsection
