<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekAkun extends Model
{
    protected $table = 'rek_akun';

    protected $fillable = [
        'kd_rek1',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function getKdAttribute()
    {
        return $this->kd_rek1;
    }
}
