<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamanKur extends Model
{
    protected $table = 'detail_pinjaman_kur';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'jenis_usaha',
    ];

    public $timestamps = false;
}
