<?php

namespace App\Models\Parameter\Global;

use Illuminate\Database\Eloquent\Model;

class Urusan extends Model
{
    protected $table = 'urusan';

    protected $fillable = [
        'kode',
        'nama'
    ];
}
