<?php

namespace App\Models\Penatausahaan;

use App\Enums\Penatausahaan\JenisBuktiGu;
use App\Enums\Penatausahaan\MetodePembayaran;
use App\Enums\Penatausahaan\StatusBuktiGu;
use App\Models\Anggaran\BelanjaRkaPd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuktiGu extends Model
{
    use SoftDeletes;

    protected $table = 'bukti_gu';

    protected $fillable = [
        'belanja_rka_pd_id',
        'nomor',
        'tanggal',
        'uraian',
        'nilai',
        'metode_pembayaran',
        'status',
        'nama',
        'alamat',
        'npwp',
        'bank_id',
        'nomor_rekening',
        'jenis'
    ];

    protected $casts = [
        'metode_pembayaran' => MetodePembayaran::class,
        'status' => StatusBuktiGu::class,
        'jenis' => JenisBuktiGu::class,
    ];

    protected $with = [
        'belanja_rka_pd'
    ];

    public function belanja_rka_pd()
    {
        return $this->belongsTo(BelanjaRkaPd::class);
    }
}
