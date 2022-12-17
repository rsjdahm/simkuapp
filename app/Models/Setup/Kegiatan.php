<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kegiatan extends Model
{
    use SoftDeletes;

    protected $table = 'kegiatan';

    protected $fillable = [
        'program_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function getKodeLengkapAttribute()
    {
        return $this->program->kode_lengkap . '.' . str_pad($this->kode, 3, '0', STR_PAD_LEFT);
    }
}
