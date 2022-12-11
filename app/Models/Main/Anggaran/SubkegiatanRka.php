<?php

namespace App\Models\Main\Anggaran;

use App\Models\Parameter\Global\Subkegiatan;
use Illuminate\Database\Eloquent\Model;

class SubkegiatanRka extends Model
{
    protected $table = 'subkegiatan_rka';

    protected $fillable = [
        'kegiatan_rka_id',
        'subkegiatan_id',
    ];

    public function kegiatan_rka()
    {
        return $this->belongsTo(KegiatanRka::class);
    }

    public function subkegiatan()
    {
        return $this->belongsTo(Subkegiatan::class);
    }
}
