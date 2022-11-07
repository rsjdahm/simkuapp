<?php

namespace App\Http\Requests\Parameter\Global;

use App\Enums\Parameter\Global\JenisKelaminPegawaiEnum;
use App\Enums\Parameter\Global\JenisPegawaiEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class PegawaiRequest extends FormRequest
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
            'nama' => ['required'],
            'gelar_dpn' => ['nullable'],
            'gelar_blkg' => ['nullable'],
            'nip' => ['nullable'],
            'nik' => ['nullable', 'numeric'],
            'tgl_lahir' => ['nullable', 'date'],
            'alamat' => ['nullable'],
            'tmpt_lahir' => ['nullable'],
            'status_kepeg' => ['required', new Enum(JenisPegawaiEnum::class)],
            'jenis_kelamin' => ['required', new Enum(JenisKelaminPegawaiEnum::class)]
        ];
    }
}
