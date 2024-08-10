<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'id_produk',
        'nama_peminjam',
        'id_agunan',
        'status',
        'tanggal_pinjaman',
        'selesai_pinjaman',
    ];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($pinjaman) {
            // Hapus agunan terkait
            $pinjaman->agunan()->delete();
        });
    }

    public function agunan()
    {
        return $this->belongsTo('App\Models\Agunan', 'id_agunan');
    }
    
    public function kur()
    {
        return $this->belongsTo('App\Models\DetailPinjamanKur', 'id_pinjaman');
    }

    public function investasi()
    {
        return $this->belongsTo('App\Models\DetailPinjamanInvestasi', 'id_pinjaman');
    }

    public function kendaraan()
    {
        return $this->belongsTo('App\Models\DetailPinjamanKendaraan', 'id_pinjaman');
    }

    public function kpr()
    {
        return $this->belongsTo('App\Models\DetailPinjamanKpr', 'id_pinjaman');
    }

    public function kta()
    {
        return $this->belongsTo('App\Models\DetailPinjamanKta', 'id_pinjaman');
    }

    public function multiguna()
    {
        return $this->belongsTo('App\Models\DetailPinjamanMultiguna', 'id_pinjaman');
    }

    public function pendidikan()
    {
        return $this->belongsTo('App\Models\DetailPinjamanPendidikan', 'id_pinjaman');
    }

    public function produk()
    {
        return $this->belongsTo('App\Models\ProdukPinjaman', 'id_produk');
    }
}
