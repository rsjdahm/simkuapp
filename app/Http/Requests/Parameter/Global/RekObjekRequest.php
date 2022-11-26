<?php

namespace App\Http\Requests\Parameter\Global;

use Illuminate\Foundation\Http\FormRequest;

class RekObjekRequest extends FormRequest
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
            'rek_jenis_id' => ['required'],
            'kode' => ['required', 'string'],
            'nama' => ['required', 'string'],
        ];
    }
}
