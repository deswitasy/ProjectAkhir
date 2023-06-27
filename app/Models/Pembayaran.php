<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Bulan;
use Illuminate\Support\Facades\DB;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
    public function bulan()
    {
        return $this->belongsTo(Bulan::class, 'id_bulan');
    }
    static function getBulanBayar($id_siswa)
    {
        $bulan = DB::table('pembayaran')
            ->where('id_siswa', $id_siswa)
            ->get();
        $id_bulan = [];
        foreach ($bulan as $bln) {
            $id_bulan[] = $bln->id_bulan;
        }
        return $id_bulan;
    }
    static function getTotalBayar($id_siswa)
    {
        $total = DB::table('pembayaran')
            ->select('jumlah')
            ->where('id_siswa', $id_siswa)
            ->get()
            ->sum('jumlah');

        return $total;
    }
}
