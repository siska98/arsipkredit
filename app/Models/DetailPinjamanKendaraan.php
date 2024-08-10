<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamanKendaraan extends Model
{
    protected $table = 'detail_pinjaman_kendaraan';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'tipe_kendaraan',
        'merk_kendaraan',
        'tahun_pembuatan',
    ];

    public $timestamps = false;
}
