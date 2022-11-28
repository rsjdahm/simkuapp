<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'program_id',
        'kode',
        'nama'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
