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
        'gelar_dpn',
        'gelar_blkg',
        'nip',
        'nik',
        'tgl_lahir',
        'alamat',
        'tmpt_lahir',
        'status_kepeg',
        'jenis_kelamin',
    ];

    protected $appends = [
        'nama_lengkap'
    ];

    protected $casts = [
        'jenis_kelamin' => JenisKelaminEnum::class,
        'status_kepeg' => StatusKepegawaianEnum::class
    ];

    public function getNamaLengkapAttribute()
    {
        if (!$this->gelar_blkg) {
            return $this->gelar_dpn . ' ' . $this->nama;
        }
        return $this->gelar_dpn . ' ' . $this->nama . ', ' . $this->gelar_blkg;
    }
}
