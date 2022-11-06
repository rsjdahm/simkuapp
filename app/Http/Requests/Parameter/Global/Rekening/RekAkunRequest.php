<?php

namespace App\Http\Requests\Parameter\Global\Rekening;

use Illuminate\Foundation\Http\FormRequest;

class RekAkunRequest extends FormRequest
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
            'kd_rek1' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
        ];
    }
}
