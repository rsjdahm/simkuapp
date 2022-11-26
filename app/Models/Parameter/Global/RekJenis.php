<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekJenis extends Model
{
    protected $table = 'rek_jenis';

    protected $fillable = [
        'rek_kelompok_id',
        'kode',
        'nama'
    ];

    public function rek_kelompok()
    {
        return $this->belongsTo(RekKelompok::class);
    }
}
