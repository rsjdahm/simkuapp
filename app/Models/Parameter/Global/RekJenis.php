<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekJenis extends Model
{
    protected $table = 'rek_jenis';

    protected $fillable = [
        'rek_kelompok_id',
        'kd_rek1',
        'kd_rek2',
        'kd_rek3',
        'nama'
    ];

    protected $appends = [
        'kd_rek'
    ];

    public function getKdRekAttribute()
    {
        return $this->kd_rek1 . '.' . $this->kd_rek2 . '.' . str_pad($this->kd_rek3, 2, '0', STR_PAD_LEFT);
    }

    public function rek_kelompok()
    {
        return $this->belongsTo(RekKelompok::class);
    }
}
