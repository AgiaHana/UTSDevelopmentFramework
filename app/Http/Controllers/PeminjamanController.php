<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PeminjamanController extends Controller
{
    public function index()
    {
        $data = Peminjaman::paginate(5);
        return view('peminjaman.index', compact('data'));
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        Session::flash('kode_alat', $request->kode_alat);
        Session::flash('nama_peminjam', $request->nama_peminjam);
        Session::flash('tanggal_pinjam', $request->tanggal_pinjam);

        $request->validate([
            'kode_alat' => 'required',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
        ], [
            'kode_alat.required' => 'Kode alat wajib diisi',
            'nama_peminjam.required' => 'Nama peminjam wajib diisi',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi',
            'tanggal_pinjam.date' => 'Tanggal pinjam harus berupa tanggal yang valid',
        ]);

        $data = [
            'kode_alat' => $request->kode_alat,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
        ];
        Peminjaman::create($data);

        return redirect()->to('peminjaman')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $data = Peminjaman::find($id);
        return view('peminjaman.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_alat' => 'required',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
        ], [
            'kode_alat.required' => 'Kode alat wajib diisi',
            'nama_peminjam.required' => 'Nama peminjam wajib diisi',
            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi',
            'tanggal_pinjam.date' => 'Tanggal pinjam harus berupa tanggal yang valid',
        ]);

        $data = [
            'kode_alat' => $request->kode_alat,
            'nama_peminjam' => $request->nama_peminjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ];
        Peminjaman::where('id', $id)->update($data);

        return redirect()->to('peminjaman')->with('success', 'Berhasil mengupdate data');
    }

    public function destroy($id)
    {
        Peminjaman::where('id', $id)->delete();
        return redirect()->to('peminjaman')->with('success', 'Berhasil menghapus data');
    }
}
