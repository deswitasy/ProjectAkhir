<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Bulan;


class PembayaranController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Data Pembayaran SPP',
            'pembayaran' => Pembayaran::all(),
            'siswa' => Siswa::all(),
        ];

        return view('pembayaran.index', $data);
    }
    public function show(Siswa $siswa)
    {
        $data = [
            'title' => 'Transaksi Pembayaran SPP',
            'siswa' => $siswa,
            'bulan1' => Bulan::whereBetween('id', [1, 6])->get(),
            'bulan2' => Bulan::whereBetween('id', [7, 12])->get(),
            'bayarSiswa' => Pembayaran::where('id_siswa', $siswa->id)->get(),
            'idBulan' => Pembayaran::getBulanBayar($siswa->id),
            'totalBayar' => Pembayaran::getTotalBayar($siswa->id),
        ];

        return view('pembayaran.transaksi', $data);
    }
    public function getBulan(Request $request)
    {
        $id = $request->id;
        $bulan = Bulan::find($id);
        return $bulan->toJson();
    }
    public function store(Request $request)
    {
        $data = [
            'id_petugas' => auth()->user()->id,
            'id_spp' => $request->id_spp,
            'id_siswa' => $request->id_siswa,
            'tgl_bayar' => date('Y-m-d'),
            'id_bulan' => $request->id_bulan,
            'tahun_bayar' => $request->tahun_bayar,
            'jumlah' => 200000,
        ];

        Pembayaran::create($data);
        return redirect('/pembayaran')->with('pembayaran', 'Selamat! Data pembayaran berhasil ditambahkan!');
    }
    public function destroy(Pembayaran $pembayaran)
    {
        Pembayaran::destroy($pembayaran->id);
        return redirect('/pembayaran')->with('pembayaran', 'Selamat! Data pembayaran berhasil dihapus!');
    }

    public function laporan()
    {
        $pembayaran = Pembayaran::paginate(10);
        if (request('tgl_awal') && request('tgl_akhir')) {
            $pembayaran = Pembayaran::whereBetween('tgl_bayar', [request('tgl_awal'), request('tgl_akhir')])->paginate(10)->withQueryString();
        }
        $data = [
            'title' => 'Laporan Pembayaran SPP',
            'pembayaran' => $pembayaran,
        ];
        return view('laporan.index', $data);
    }

    public function cetak(Request $request)
    {
        $pembayaran = Pembayaran::all();
        if (request('awal') && request('akhir')) {
            $pembayaran = Pembayaran::whereBetween('tgl_bayar', [request('awal'), request('akhir')])->get();
        }
        $data = [
            'title' => 'Laporan Pembayaran SPP',
            'pembayaran' => $pembayaran,
            'tgl_awal' => request('awal'),
            'tgl_akhir' => request('akhir'),
        ];
        return view('laporan.cetakexcel', $data);
    }
    public function print(Pembayaran $pembayaran)
    {
        dd($pembayaran);
    }
}
