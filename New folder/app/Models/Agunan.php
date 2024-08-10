<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agunan extends Model
{
    protected $table = 'agunan';

    protected $primaryKey = 'id_agunan';

    protected $fillable = [
        'jenis_agunan',
        'nama_pemilik_agunan',
        'jenis_pengikat',
        'nilai_pengikatan',
        'keterangan',
    ];

    public $timestamps = false;
    public function agunan()
{
    return $this->belongsTo('App\Models\Agunan', 'id_agunan');
}
}
