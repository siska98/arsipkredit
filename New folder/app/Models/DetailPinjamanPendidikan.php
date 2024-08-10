<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamanPendidikan extends Model
{
    protected $table = 'detail_pinjaman_pendidikan';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'jenjang_pendidikan',
        'institusi_pendidikan',
    ];

    public $timestamps = false;
}
