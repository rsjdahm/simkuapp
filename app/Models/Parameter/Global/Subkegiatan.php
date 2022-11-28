<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Subkegiatan extends Model
{
    protected $table = 'subkegiatan';

    protected $fillable = [
        'kegiatan_id',
        'kode',
        'nama'
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Program::class);
    }
}
