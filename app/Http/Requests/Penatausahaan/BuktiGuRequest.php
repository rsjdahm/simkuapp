<?php

namespace App\Http\Requests\Penatausahaan;

use App\Enums\Penatausahaan\JenisBuktiGu;
use App\Enums\Penatausahaan\MetodePembayaran;
use App\Enums\Penatausahaan\StatusBuktiGu;
use App\Enums\Penatausahaan\StatusPendingBuktiGu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class BuktiGuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'belanja_rka_pd_id' => ['required', 'exists:belanja_rka_pd,id'],
            'status_pending' => ['required', new Enum(StatusPendingBuktiGu::class)],
            'nomor' => ['required_if:status_pending,' . StatusPendingBuktiGu::Normal->value, 'nullable', 'string'],
            'tanggal' => ['required_if:status_pending,' . StatusPendingBuktiGu::Normal->value, 'nullable', 'date'],
            'uraian' => ['required', 'string'],
            'nilai' => ['required', 'numeric'],
            'metode_pembayaran' => ['required', new Enum(MetodePembayaran::class)],
            'status' => ['required', new Enum(StatusBuktiGu::class)],
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'npwp' => ['nullable', 'string'],
            'bank_id' => ['required_if:metode_pembayaran,' . MetodePembayaran::Transfer->value, 'nullable', 'exists:bank,id'],
            'nomor_rekening' => ['required_if:metode_pembayaran,' . MetodePembayaran::Transfer->value, 'nullable', 'string'],
            'jenis' => ['required', new Enum(JenisBuktiGu::class)]
        ];
    }
}
