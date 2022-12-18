<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubUnitKerja extends Model
{
    use SoftDeletes;

    protected $table = 'sub_unit_kerja';

    protected $fillable = [
        'unit_kerja_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->unit_kerja->kode_lengkap . '.' . str_pad($this->kode, 3, '0', STR_PAD_LEFT);
    }
}
