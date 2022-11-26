<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekSubRincObjek extends Model
{
    protected $table = 'rek_sub_rinc_objek';

    protected $fillable = [
        'rek_rinc_objek_id',
        'kode',
        'nama'
    ];

    public function rek_rinc_objek()
    {
        return $this->belongsTo(RekRincObjek::class);
    }
}
