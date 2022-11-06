<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekObjek extends Model
{
    protected $table = 'rek_objek';

    protected $fillable = [
        'rek_jenis_id',
        'kd_rek1',
        'kd_rek2',
        'kd_rek3',
        'kd_rek4',
        'nama'
    ];

    protected $appends = [
        'kd_rek'
    ];

    public function getKdRekAttribute()
    {
        return $this->kd_rek1 . '.' . $this->kd_rek2 . '.' . str_pad($this->kd_rek3, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_rek4, 2, '0', STR_PAD_LEFT);
    }

    public function rek_jenis()
    {
        return $this->belongsTo(RekJenis::class);
    }
}
