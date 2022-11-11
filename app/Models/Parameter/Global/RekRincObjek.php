<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekRincObjek extends Model
{
    protected $table = 'rek_rinc_objek';

    protected $fillable = [
        'rek_objek_id',
        'kd_rek1',
        'kd_rek2',
        'kd_rek3',
        'kd_rek4',
        'kd_rek5',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function getKdAttribute()
    {
        return $this->kd_rek1 . '.' . $this->kd_rek2 . '.' . str_pad($this->kd_rek3, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_rek4, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_rek5, 2, '0', STR_PAD_LEFT);
    }

    public function rek_objek()
    {
        return $this->belongsTo(RekObjek::class);
    }
}
