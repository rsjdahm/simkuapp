<?php

namespace App\Models\Penatausahaan;

use App\Enums\Penatausahaan\JenisBuktiGu;
use App\Enums\Penatausahaan\MetodePembayaran;
use App\Enums\Penatausahaan\StatusBuktiGu;
use App\Enums\Penatausahaan\StatusPendingBuktiGu;
use App\Models\Anggaran\BelanjaRkaPd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BuktiGu extends Model
{
    use SoftDeletes;

    protected $table = 'bukti_gu';

    protected $fillable = [
        'belanja_rka_pd_id',
        'status_pending',
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
        'status_pending' => StatusPendingBuktiGu::class,
        'metode_pembayaran' => MetodePembayaran::class,
        // 'tanggal' => 'date',
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

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function potongan_bukti_gu()
    {
        return $this->hasMany(PotonganBuktiGu::class);
    }
}
