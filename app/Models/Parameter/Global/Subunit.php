<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    protected $table = 'subunit';

    protected $fillable = [
        'unit_id',
        'kd_urusan',
        'kd_bidang',
        'kd_unit',
        'kd_subunit',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getKdAttribute()
    {
        return $this->kd_urusan . '.' . str_pad($this->kd_bidang, 2, '0', STR_PAD_LEFT) . '.' . '0-00' . '.' . '0-00' . '.' . str_pad($this->kd_unit, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_subunit, 3, '0', STR_PAD_LEFT);
    }
}
