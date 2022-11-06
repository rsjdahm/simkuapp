<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekKelompok extends Model
{
    protected $table = 'rek_kelompok';

    protected $fillable = [
        'rek_akun_id',
        'kd_rek1',
        'kd_rek2',
        'nama'
    ];

    protected $appends = [
        'kd_rek'
    ];

    public function getKdRekAttribute()
    {
        return $this->kd_rek1 . '.' . $this->kd_rek2;
    }

    public function rek_akun()
    {
        return $this->belongsTo(RekAkun::class);
    }
}
