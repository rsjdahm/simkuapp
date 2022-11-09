<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    protected $table = 'urusan';

    protected $fillable = [
        'kd_urusan',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function getKdAttribute()
    {
        return $this->kd_urusan;
    }
}
