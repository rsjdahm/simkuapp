<?php

namespace App\Enums\Main\Anggaran;

enum JenisRkaEnum: string
{
    case Murni = 'Murni';
    case Perubahan = 'Perubahan';
    case Mendahulukan = 'Mendahulukan';
    case AmbangBatas = 'Ambang Batas';
}
