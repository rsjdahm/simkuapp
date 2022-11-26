<?php

namespace App\Models\Main\Anggaran;

use App\Enums\Main\Anggaran\JenisRkaEnum;
use Illuminate\Database\Eloquent\Model;

class Rka extends Model
{
    protected $table = 'rka';

    protected $fillable = [
        'subunit_id',
        'no_dokumen',
        'tgl_dokumen',
        'uraian',
        'jenis',
        'thn_anggaran',
    ];

    protected $casts = [
        'jenis' => JenisRkaEnum::class
    ];
}