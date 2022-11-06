<?php

namespace App\Http\Requests\Parameter\Global\Rekening;

use Illuminate\Foundation\Http\FormRequest;

class RekRincObjekRequest extends FormRequest
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
            'rek_objek_id' => ['required'],
            'kd_rek1' => ['required', 'numeric'],
            'kd_rek2' => ['required', 'numeric'],
            'kd_rek3' => ['required', 'numeric'],
            'kd_rek4' => ['required', 'numeric'],
            'kd_rek5' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
        ];
    }
}
