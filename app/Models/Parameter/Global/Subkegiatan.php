<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Subkegiatan extends Model
{
    protected $table = 'subkegiatan';

    protected $fillable = [
        'kegiatan_id',
        'kd_urusan',
        'kd_bidang',
        'kd_program',
        'kd_kegiatan',
        'kd_subkegiatan',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Program::class);
    }

    public function getKdAttribute()
    {
        return $this->kd_urusan . '.' . str_pad($this->kd_bidang, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_program, 2, '0', STR_PAD_LEFT) . '.' . '1-' . str_pad($this->kd_kegiatan, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_subkegiatan, 3, '0', STR_PAD_LEFT);
    }
}
