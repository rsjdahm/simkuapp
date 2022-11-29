<?php

namespace App\Http\Requests\Main\Anggaran;

use App\Enums\Main\Anggaran\JenisRkaEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class RkaRequest extends FormRequest
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
            'subunit_id' => ['required'],
            'no_dokumen' => ['required'],
            'tanggal_dokumen' => ['required', 'date'],
            'uraian' => ['nullable'],
            'jenis' => ['required', new Enum(JenisRkaEnum::class)],
            'tahun_anggaran' => ['required', 'numeric'],
        ];
    }
}
