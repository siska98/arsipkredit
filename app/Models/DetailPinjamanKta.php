<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamanKta extends Model
{
    protected $table = 'detail_pinjaman_kta';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'tujuan_penggunaan',
    ];

    public $timestamps = false;
}
