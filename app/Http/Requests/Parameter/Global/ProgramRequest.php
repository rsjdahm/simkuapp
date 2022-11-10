<?php

namespace App\Http\Requests\Parameter\Global;

use Illuminate\Foundation\Http\FormRequest;

class ProgramRequest extends FormRequest
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
            'bidang_id' => ['required'],
            'kd_urusan' => ['required', 'numeric'],
            'kd_bidang' => ['required', 'numeric'],
            'kd_program' => ['required', 'numeric'],
            'nama' => ['required', 'string']
        ];
    }
}
