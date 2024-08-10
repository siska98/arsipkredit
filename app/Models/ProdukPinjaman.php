<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukPinjaman extends Model
{
    protected $table = 'produk_pinjaman';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'deskripsi',
    ];

    public $timestamps = false;
    public function pinjaman()
    {
        return $this->hasMany('App\Models\Pinjaman', 'id_produk');
    }
}
