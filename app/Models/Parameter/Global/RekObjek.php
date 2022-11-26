<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekObjek extends Model
{
    protected $table = 'rek_objek';

    protected $fillable = [
        'rek_jenis_id',
        'kode',
        'nama'
    ];

    public function rek_jenis()
    {
        return $this->belongsTo(RekJenis::class);
    }
}
