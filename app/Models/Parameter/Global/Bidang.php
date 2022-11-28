<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table = 'bidang';

    protected $fillable = [
        'urusan_id',
        'kode',
        'nama'
    ];

    public function urusan()
    {
        return $this->belongsTo(Urusan::class);
    }
}
