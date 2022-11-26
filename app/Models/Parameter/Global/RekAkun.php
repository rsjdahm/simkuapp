<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class RekAkun extends Model
{
    protected $table = 'rek_akun';

    protected $fillable = [
        'kode',
        'nama'
    ];
}
