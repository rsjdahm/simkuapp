<?php

namespace App\Enums\Anggaran;

enum StatusRkaPdEnum: string
{
    case Murni = 'Murni';
    case Pergeseran = 'Pergeseran';
    case Perubahan = 'Perubahan';
    case AmbangBatas = 'Ambang Batas';
}
