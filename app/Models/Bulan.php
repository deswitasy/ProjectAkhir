<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembayaran;

class Bulan extends Model
{
    use HasFactory;
    protected $table = 'bulan';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_bulan');
    }
}
