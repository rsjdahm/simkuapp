<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekJenis extends Model
{
    use SoftDeletes;

    protected $table = 'rek_jenis';

    protected $fillable = [
        'rek_kelompok_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function rek_kelompok()
    {
        return $this->belongsTo(RekKelompok::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->rek_kelompok->kode_lengkap . '.' . str_pad($this->kode, 1, '0', STR_PAD_LEFT);
    }

    // public function rek_objek()
    // {
    //     return $this->hasMany(RekObjek::class);
    // }
}
