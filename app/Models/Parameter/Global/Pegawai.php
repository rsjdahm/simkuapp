<?php

namespace App\Models\Parameter\Global;

use App\Enums\Parameter\Global\JenisKelaminEnum;
use App\Enums\Parameter\Global\StatusKepegawaianEnum;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'gelar_depan',
        'gelar_belakang',
        'nip',
        'nik',
        'npwp',
        'tanggal_lahir',
        'alamat',
        'tempat_lahir',
        'status_kepegawaian',
        'jenis_kelamin',
    ];

    protected $casts = [
        'jenis_kelamin' => JenisKelaminEnum::class,
        'status_kepegawaian' => StatusKepegawaianEnum::class
    ];
}
