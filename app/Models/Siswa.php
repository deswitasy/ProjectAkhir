<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'id_spp');
    }
    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_siswa');
    }
}
