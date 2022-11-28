<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'unit';

    protected $fillable = [
        'bidang_id',
        'kode',
        'nama'
    ];

    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
