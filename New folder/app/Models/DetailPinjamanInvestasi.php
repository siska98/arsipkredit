<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamanInvestasi extends Model
{
    protected $table = 'detail_pinjaman_investasi';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'tujuan_investasi',
    ];

    public $timestamps = false;
}
