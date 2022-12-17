<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekKelompok extends Model
{
    use SoftDeletes;

    protected $table = 'rek_kelompok';

    protected $fillable = [
        'rek_akun_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function rek_akun()
    {
        return $this->belongsTo(RekAkun::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->rek_akun->kode_lengkap . '.' . str_pad($this->kode, 1, '0', STR_PAD_LEFT);
    }

    // public function rek_jenis()
    // {
    //     return $this->hasMany(RekJenis::class);
    // }
}
