<?php

namespace App\Http\Requests\Penatausahaan;

use App\Enums\Penatausahaan\JenisBuktiGu;
use App\Enums\Penatausahaan\MetodePembayaran;
use App\Enums\Penatausahaan\StatusBuktiGu;
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
            'nomor' => ['required', 'string'],
            'tanggal' => ['required', 'date'],
            'uraian' => ['required', 'string'],
            'nilai' => ['required', 'numeric'],
            'metode_pembayaran' => ['required', new Enum(MetodePembayaran::class)],
            'status' => ['required', new Enum(StatusBuktiGu::class)],
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'npwp' => ['nullable', 'string'],
            'bank_id' => ['nullable', 'exists:bank,id'],
            'nomor_rekening' => ['nullable', 'string'],
            'jenis' => ['required', new Enum(JenisBuktiGu::class)]
        ];
    }
}
