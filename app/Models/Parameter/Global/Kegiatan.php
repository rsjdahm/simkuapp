<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'program_id',
        'kd_urusan',
        'kd_bidang',
        'kd_program',
        'kd_kegiatan',
        'nama'
    ];

    protected $appends = [
        'kd'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function getKdAttribute()
    {
        return $this->kd_urusan . '.' . str_pad($this->kd_bidang, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_program, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_kegiatan, 2, '0', STR_PAD_LEFT);
    }
}
