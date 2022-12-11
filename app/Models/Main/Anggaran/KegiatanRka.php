<?php

namespace App\Models\Main\Anggaran;

use App\Models\Parameter\Global\Kegiatan;
use Illuminate\Database\Eloquent\Model;

class KegiatanRka extends Model
{
    protected $table = 'kegiatan_rka';

    protected $fillable = [
        'program_rka_id',
        'kegiatan_id',
    ];

    public function program_rka()
    {
        return $this->belongsTo(ProgramRka::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
