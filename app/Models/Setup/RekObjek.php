<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekObjek extends Model
{
    use SoftDeletes;

    protected $table = 'rek_objek';

    protected $fillable = [
        'rek_jenis_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function rek_jenis()
    {
        return $this->belongsTo(RekJenis::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->rek_jenis->kode_lengkap . '.' . str_pad($this->kode, 2, '0', STR_PAD_LEFT);
    }

    // public function rek_rincian_objek()
    // {
    //     return $this->hasMany(RekRincianObjek::class);
    // }
}
