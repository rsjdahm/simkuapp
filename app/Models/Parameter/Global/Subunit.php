<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Subunit extends Model
{
    protected $table = 'subunit';

    protected $fillable = [
        'unit_id',
        'kode',
        'nama'
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
