<?php

namespace App\Models\Parameter\Global;

use App\Enums\Parameter\Global\JenisKelaminPegawaiEnum;
use App\Enums\Parameter\Global\JenisPegawaiEnum;
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
        'jenis_kelamin' => JenisKelaminPegawaiEnum::class,
        'status_kepeg' => JenisPegawaiEnum::class
    ];

    public function getNamaLengkapAttribute()
    {
        return $this->gelar_dpn . ' ' . $this->nama . ', ' . $this->gelar_blkg;
    }
}
