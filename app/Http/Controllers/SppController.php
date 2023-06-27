<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;

class SppController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Spp',
            'spp' => Spp::all(),
        ];

        return view('spp.index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah Data Spp',
        ];
        return view('spp.tambah', $data);
    }
    public function store(Request $request)
    {
        $rules = $request->validate([
            'tahun_spp' => 'required|min:4',
            'nominal' => 'required|min:3|max:15',
        ]);
        Spp::create($rules);
        return redirect('/spp')->with('spp', 'Selamat! Data Anda telah ditambahkan.');
    }
    public function edit(Spp $spp)
    {
        $data = [
            'title' => 'Edit Data Spp',
            'spp' => $spp,

        ];
        return view('spp.edit', $data);
    }
    public function update(Request $request)
    {
        $rules = $request->validate([
            'tahun_spp' => 'Required',
            'nominal' => 'Required',
        ]);

        Spp::where('id', $request->id)
            ->update($rules);

        return redirect('/spp')->with('spp', 'Selamat! Data spp berhasil diubah!');
    }
    public function destroy($id)
    {
        Spp::where('id', $id)->delete();
        return redirect('/spp')->with('spp', 'Selamat! Data kelas berhasil dihapus!');
    }
}
