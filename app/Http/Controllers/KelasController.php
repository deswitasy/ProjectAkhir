<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Kelas',
            'kelas' => Kelas::all(),
        ];

        return view('kelas.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Kelas',
        ];
        return view('kelas.tambah', $data);
    }

    public function store(Request $request)
    {
        $rules = $request->validate([
            'nama_kelas' => 'required|min:5|unique:kelas,nama_kelas',
            'jurusan' => 'required|min:10',
        ]);
        Kelas::create($rules);
        return redirect('/kelas')->with('kelas', 'Selamat! Data Anda telah ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        $data = [
            'title' => 'Edit Data kelas',
            'kelas' => $kelas,

        ];
        return view('kelas.edit', $data);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $rules = $request->validate([
            'nama_kelas' => 'Required', 'min:5', Rule::unique('kelas')->ignore($kelas->id),
            'jurusan' => 'Required|min:10',
        ]);

        Kelas::where('id', $request->id)
            ->update($rules);

        return redirect('/kelas')->with('kelas', 'Selamat! Data kelas berhasil diubah!');
    }

    public function destroy(Kelas $kelas)
    {
        if ($kelas->siswa->first()) {
            return redirect('/kelas')->with('kelas', ' <span class="font-weight-bold text-warning">Maaf!</span> Data kelas tidak bisa dihapus, karena sedang digunakan oleh siswa, Silahkan cek kembali!');
        };
        Kelas::destroy($kelas->id);
        return redirect('/kelas')->with('kelas', 'Selamat! Data kelas berhasil dihapus!');
    }
}
