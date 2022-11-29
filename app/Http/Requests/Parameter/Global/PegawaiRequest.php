<?php

namespace App\Http\Requests\Parameter\Global;

use App\Enums\Parameter\Global\JenisKelaminEnum;
use App\Enums\Parameter\Global\StatusKepegawaianEnum;
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
            'gelar_depan' => ['nullable'],
            'gelar_belakang' => ['nullable'],
            'nip' => ['nullable'],
            'nik' => ['nullable', 'numeric'],
            'npwp' => ['nullable'],
            'tanggal_lahir' => ['nullable', 'date'],
            'alamat' => ['nullable'],
            'tempat_lahir' => ['nullable'],
            'status_kepegawaian' => ['required', new Enum(StatusKepegawaianEnum::class)],
            'jenis_kelamin' => ['required', new Enum(JenisKelaminEnum::class)]
        ];
    }
}
