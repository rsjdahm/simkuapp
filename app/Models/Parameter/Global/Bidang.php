<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    protected $fillable = [
        'urusan_id',
        'kd_urusan',
        'kd_bidang',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function urusan()
    {
        return $this->belongsTo(Urusan::class);
    }

    public function getKdAttribute()
    {
        return $this->kd_urusan . '.' . str_pad($this->kd_bidang, 2, '0', STR_PAD_LEFT);
    }
}
