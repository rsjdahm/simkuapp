<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekKelompok extends Model
{
    protected $table = 'rek_kelompok';

    protected $fillable = [
        'rek_akun_id',
        'kode',
        'nama'
    ];

    public function rek_akun()
    {
        return $this->belongsTo(RekAkun::class);
    }
}
