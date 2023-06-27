<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Kelas;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa' => Siswa::all(),
        ];

        return view('siswa.index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Siswa',
            'spp' => Spp::all(),
            'kelas' => Kelas::all(),
        ];
        return view('siswa.tambah', $data);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|max:10|unique:siswa,nisn',
            'nis' => 'required|max:8|unique:siswa,nis',
            'nama' => 'required|min:4',
            'email' => 'required|unique:siswa,email|email:rfc',
            'alamat' => 'required',
            'no_hp' => 'required|max:13',
            'id_kelas' => 'required',
            'id_spp' => 'required',
        ]);

        Siswa::create($validatedData);
        return redirect('/siswa')->with('siswa', 'Selamat! Data Anda telah ditambahkan.');
    }
    public function edit(Siswa $siswa)
    {
        $data = [
            'title' => 'Edit Data Siswa',
            'siswa' => $siswa,
            'spp' => Spp::all(),
            'kelas' => Kelas::all()

        ];
        return view('siswa.edit', $data);
    }
    public function update(Request $request, Siswa $siswa)
    {
        $validatedData = $request->validate([
            'nisn' => ['required', 'max:10', Rule::unique('siswa')->ignore($siswa->id)],
            'nis' => ['required', 'max:8', Rule::unique('siswa')->ignore($siswa->id)],
            'nama' => 'required|min:4',
            'email' => ['required', 'email:rfc', Rule::unique('siswa')->ignore($siswa->id)],
            'alamat' => 'required',
            'no_hp' => 'required|max:13',
            'id_kelas' => 'required',
            // 'id_spp' => 'required',
        ]);

        Siswa::where('id', $siswa->id)->update($validatedData);
        return redirect('/siswa')->with('siswa', 'Selamat! Data siswa berhasil diubah!');
    }
    public function destroy(Siswa $siswa)
    {
        if ($siswa->pembayaran->first()) {

            return redirect('/siswa')->with('siswa', 'Maaf! Data siswa tidak dapat dihapus karena masi pembayaranh terdaftar di riwayat!');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            Siswa::destroy($siswa->id);
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
            return redirect('/siswa')->with('siswa', 'Selamat! Data siswa berhasil dihapus!');
        }
    }
    public function getSiswa(Request $request)
    {
        $id = $request->id;
        $siswa = Siswa::find($id);
        $data = collect([
            'siswa' => $siswa,
            'kelas' => $siswa->kelas,
            'spp' => $siswa->spp,
        ]);
        return $data->toJson();
    }
}
