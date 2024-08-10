<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPinjamanMultiguna extends Model
{
    protected $table = 'detail_pinjaman_multiguna';

    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'keperluan',
    ];

    public $timestamps = false;
}
