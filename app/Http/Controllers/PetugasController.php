<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Petugas',
            'petugas' => Petugas::all(),

        ];

        return view('petugas.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Petugas',
        ];
        return view('petugas.tambah', $data);
    }
    public function store(Request $request)
    {
        $rules = $request->validate([
            'nama' => 'required|min:5',
            'username' => 'required|min:5|max:20',
            'level' => 'required',
        ]);

        $rules['status'] = 'nonaktif';
        $rules['password'] = password_hash('123456', PASSWORD_DEFAULT);
        $rules['photo'] = 'user.jpg';

        Petugas::create($rules);
        return redirect('/petugas')->with('petugas', 'Selamat! Data Anda telah ditambahkan.');
    }
    public function edit(Petugas $petugas)
    {
        $data = [
            'title' => 'Edit Data Petugas',
            'petugas' => $petugas,

        ];
        return view('petugas.edit', $data);
    }
    public function update(Request $request)
    {
        $rules = $request->validate([
            'level' => 'Required',
            'status' => 'Required',
        ]);

        Petugas::where('id', $request->id)
            ->update($rules);

        return redirect('/petugas')->with('petugas', 'Selamat! Data petugas berhasil diubah!');
    }
    public function destroy($id)
    {
        Petugas::where('id', $id)->delete();
        return redirect('/petugas')->with('petugas', 'Selamat! Data petugas berhasil dihapus!');
    }
}
