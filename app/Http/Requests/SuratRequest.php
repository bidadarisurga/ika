<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuratRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'no_surat' => 'required|integer',
            'tgl_surat' => 'required|date',
            'perihal' => 'required|string',
            'no_adm' => 'required|integer',
            'tgl_adm' => 'required|date',
            'distribusi' => 'required|string',
            'tindak_lanjut' => 'required|string',
            'status' => 'required',
            'sifat' => 'required'
        ];
    }
}
