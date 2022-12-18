<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekSubRincianObjek extends Model
{
    use SoftDeletes;

    protected $table = 'rek_sub_rincian_objek';

    protected $fillable = [
        'rek_rincian_objek_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function rek_rincian_objek()
    {
        return $this->belongsTo(RekRincianObjek::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->rek_rincian_objek->kode_lengkap . '.' . str_pad($this->kode, 4, '0', STR_PAD_LEFT);
    }
}
