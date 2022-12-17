<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bidang extends Model
{
    use SoftDeletes;

    protected $table = 'bidang';

    protected $fillable = [
        'urusan_id',
        'kode',
        'nama'
    ];

    protected $appends = [
        'kode_lengkap',
    ];

    public function urusan()
    {
        return $this->belongsTo(Urusan::class);
    }

    public function getKodeLengkapAttribute()
    {
        return str_pad($this->urusan->kode, 1, '0', STR_PAD_LEFT) . '.' . str_pad($this->kode, 2, '0', STR_PAD_LEFT);
    }

    public function program()
    {
        return $this->hasMany(Program::class);
    }
}
