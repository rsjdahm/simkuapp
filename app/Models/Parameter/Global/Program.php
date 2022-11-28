<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $table = 'program';

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
