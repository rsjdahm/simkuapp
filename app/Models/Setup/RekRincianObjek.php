<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekRincianObjek extends Model
{
    use SoftDeletes;

    protected $table = 'rek_rincian_objek';

    protected $fillable = [
        'rek_objek_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function rek_objek()
    {
        return $this->belongsTo(RekObjek::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->rek_objek->kode_lengkap . '.' . str_pad($this->kode, 2, '0', STR_PAD_LEFT);
    }

    // public function rek_sub_rincian_objek()
    // {
    //     return $this->hasMany(RekSubRincianObjek::class);
    // }
}
