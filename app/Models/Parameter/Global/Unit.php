<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    protected $fillable = [
        'bidang_id',
        'kd_urusan',
        'kd_bidang',
        'kd_unit',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    public function getKdAttribute()
    {
        return $this->kd_urusan . '.' . str_pad($this->kd_bidang, 2, '0', STR_PAD_LEFT) . '.' . '0.00.0.00' . '.' . str_pad($this->kd_unit, 2, '0', STR_PAD_LEFT);
    }
}
