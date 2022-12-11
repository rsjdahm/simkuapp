<?php

namespace App\Http\Requests\Main\Anggaran;

use Illuminate\Foundation\Http\FormRequest;

class KegiatanRkaRequest extends FormRequest
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
            'program_rka_id' => ['required'],
            'kegiatan_id' => ['required'],
        ];
    }
}
