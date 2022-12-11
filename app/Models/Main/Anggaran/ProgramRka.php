<?php

namespace App\Models\Main\Anggaran;

use App\Models\Parameter\Global\Program;
use Illuminate\Database\Eloquent\Model;

class ProgramRka extends Model
{
    protected $table = 'program_rka';

    protected $fillable = [
        'program_id',
        'rka_id',
    ];


    public function rka()
    {
        return $this->belongsTo(Rka::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
