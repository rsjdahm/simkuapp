<?php

namespace App\Http\Requests\Penatausahaan;

use App\Enums\Penatausahaan\StatusPotonganBuktiGu;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class PotonganBuktiGuRequest extends FormRequest
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
            'bukti_gu_id' => ['required', 'exists:bukti_gu,id'],
            'potongan_pfk_id' => ['required', 'exists:potongan_pfk,id'],
            'nilai' => ['required', 'numeric'],
            'nomor_billing' => ['required', 'string'],
            'nomor_penyetoran' => ['nullable', 'string'],
            'status' => ['required', new Enum(StatusPotonganBuktiGu::class)]
        ];
    }
}
