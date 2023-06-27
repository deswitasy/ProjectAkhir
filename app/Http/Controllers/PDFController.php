<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Pembayaran;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
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

        $pdf = PDF::loadView('laporan/cetakpdf', $data)->setPaper('a4', 'landscape')->setOption(['dpi' => 120, 'defaultFont' => 'sans-serif']);

        return $pdf->download('laporan_spp.pdf');
    }
    public function print(Pembayaran $pembayaran)
    {
        $data = [
            'pembayaran' => $pembayaran,
        ];

        // return view('pembayaran.cetak_kwitansi', $data);
        $pdf = PDF::loadView('pembayaran.cetak_kwitansi', $data)->setPaper('a5', 'landscape')->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif', 'attachment' => false]);

        return $pdf->download('kwitansi_' . $pembayaran->siswa->nis . '_' . $pembayaran->bulan->nama_bulan . '.pdf');
    }
}
