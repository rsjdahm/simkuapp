<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RekAkun extends Model
{
    use SoftDeletes;

    protected $table = 'rek_akun';

    protected $fillable = [
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function getKodeLengkapAttribute()
    {
        return str_pad($this->kode, 1, '0', STR_PAD_LEFT);
    }

    // public function bidang()
    // {
    //     return $this->hasMany(Bidang::class);
    // }
}
