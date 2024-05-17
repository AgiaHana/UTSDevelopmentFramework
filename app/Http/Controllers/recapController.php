<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mahasiswaController extends Controller
{
    /**
     * Menampilkan daftar sumber daya.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = mahasiswa::where('nim', 'like', "%katakunci%")
                ->orWhere('nama', 'like', "%katakunci%")->orWhere('jurusan', 'like', "%katakunci%")
                ->paginate($jumlahbaris);
        } else {

            $data = mahasiswa::orderBy('nim', 'desc')->paginate(5); // Mendapatkan data mahasiswa dengan pagination, 10 item per halaman
        }
        return view('recap.index', compact('data')); // Mengirim data ke view
    }

    /**
     * Menampilkan form untuk membuat sumber daya baru.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Menyimpan sumber daya baru yang baru dibuat ke dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menyimpan input ke dalam sesi
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);

        // Validasi input
        $request->validate([
            'nim' => 'required|numeric|unique:mahasiswa,nim',
            'nama' => 'required',
            'jurusan' => 'required',
        ], [
            'nim.required' => 'NIM wajib diisi',
            'nim.numeric' => 'NIM wajib diisi dalam angka',
            'nim.unique' => 'NIM yang diisikan sudah ada dalam database',
            'nama.required' => 'NAMA wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);

        // Menyimpan data yang sudah divalidasi ke dalam database
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ];
        mahasiswa::create($data);

        // Redirect ke halaman mahasiswa dengan pesan sukses
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Menampilkan sumber daya yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Menampilkan form untuk mengedit sumber daya yang ditentukan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = mahasiswa::where('nim', $id)->first(); // Mendapatkan data mahasiswa berdasarkan NIM
        return view('mahasiswa.edit')->with('data', $data); // Mengirim data ke view edit
    }

    /**
     * Memperbarui sumber daya yang ditentukan di dalam penyimpanan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
        ], [
            'nama.required' => 'NAMA wajib diisi',
            'jurusan.required' => 'Jurusan wajib diisi',
        ]);

        // Menyimpan data yang sudah divalidasi ke dalam database
        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ];
        mahasiswa::where('nim', $id)->update($data); // Update data berdasarkan NIM

        // Redirect ke halaman mahasiswa dengan pesan sukses
        return redirect()->to('mahasiswa')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Menghapus sumber daya yang ditentukan dari penyimpanan.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mahasiswa::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhaisl melakaukan delete data');
    }
}
