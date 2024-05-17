<?php

namespace App\Http\Controllers;

use App\Models\Peralatan;
use Illuminate\Auth\SessionGuard;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class PeralatanController extends Controller
{
    public function index()
    {
        $data = Peralatan::paginate(5);
        return view('peralatan.index', compact('data'));
    }

    public function create()
    {
        return view('peralatan.create');
    }

    public function store(Request $request)
    {
        session()->put('kode_alat', $request->kode_alat);
        session()->put('nama_alat', $request->nama_alat);
        session()->put('deskripsi', $request->deskripsi);
        // Session::flash('kode_alat', $request->kode_alat);
        // Session::flash('nama_alat', $request->nama_alat);
        // Session::flash('deskripsi', $request->deskripsi);

        $request->validate([
            'kode_alat' => 'required',
            'nama_alat' => 'required',
            'deskripsi' => 'required',
        ], [
            'kode_alat.required' => 'Kode alat wajib diisi',
            'nama_alat.required' => 'Nama alat wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        $data = [
            'kode_alat' => $request->kode_alat,
            'nama_alat' => $request->nama_alat,
            'deskripsi' => $request->deskripsi,
        ];
        Peralatan::create($data);

        return redirect()->to('peralatan')->with('success', 'Berhasil menambahkan data');
    }

    public function edit($id)
    {
        $data = Peralatan::find($id);
        return view('peralatan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_alat' => 'required',
            'nama_alat' => 'required',
            'deskripsi' => 'required',
        ], [
            'kode_alat.required' => 'Kode alat wajib diisi',
            'nama_alat.required' => 'Nama alat wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ]);

        $data = [
            'kode_alat' => $request->kode_alat,
            'nama_peminjam' => $request->nama_peminjam,
            'deskripsi' => $request->deskripsi,
        ];
        Peralatan::where('id', $id)->update($data);

        return redirect()->to('peralatan')->with('success', 'Berhasil mengupdate data');
    }

    public function destroy($id)
    {
        Peralatan::where('id', $id)->delete();
        return redirect()->to('peralatan')->with('success', 'Berhasil menghapus data');
    }
}

