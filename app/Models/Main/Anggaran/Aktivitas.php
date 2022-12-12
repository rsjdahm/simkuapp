<?php

namespace App\Models\Main\Anggaran;

use Illuminate\Database\Eloquent\Model;

class Aktivitas extends Model
{
    protected $table = 'aktivitas';

    protected $fillable = [
        'subkegiatan_rka_id',
        'uraian'
    ];

    public function subkegiatan_rka()
    {
        return $this->belongsTo(SubkegiatanRka::class);
    }
}
