<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Urusan extends Model
{
    use SoftDeletes;

    protected $table = 'urusan';

    protected $fillable = [
        'kode',
        'nama'
    ];
}
