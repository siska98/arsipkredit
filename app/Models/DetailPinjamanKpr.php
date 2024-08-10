<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamanKpr extends Model
{
    protected $table = 'detail_pinjaman_kpr';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'tipe_rumah',
        'alamat_rumah',
    ];

    public $timestamps = false;
    public function kprs()
    {
        return $this->belongsTo('App\Models\Pinjaman', 'id_pinjaman');
    }
}
