<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubKegiatan extends Model
{
    use SoftDeletes;

    protected $table = 'sub_kegiatan';

    protected $fillable = [
        'kegiatan_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->kegiatan->kode_lengkap . '.' . str_pad($this->kode, 3, '0', STR_PAD_LEFT);
    }
}
