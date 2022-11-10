<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';

    protected $fillable = [
        'bidang_id',
        'kd_urusan',
        'kd_bidang',
        'kd_program',
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
        return $this->kd_urusan . '.' . str_pad($this->kd_bidang, 2, '0', STR_PAD_LEFT) . '.' . str_pad($this->kd_program, 2, '0', STR_PAD_LEFT);
    }
}
