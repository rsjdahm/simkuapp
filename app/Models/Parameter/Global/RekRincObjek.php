<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekRincObjek extends Model
{
    protected $table = 'rek_rinc_objek';

    protected $fillable = [
        'rek_objek_id',
        'kode',
        'nama'
    ];

    public function rek_objek()
    {
        return $this->belongsTo(RekObjek::class);
    }
}
