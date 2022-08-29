<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCalonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama' => 'required|max:50',
            'nim' => 'required|min:10|max:10|' . Rule::unique('calons', 'nim'),
            'angkatan' => 'required|' . Rule::in(['2019', '2020', '2021', '2022']) ,
            'kelas' => 'required|' . Rule::in(['A', 'B', 'C']),
            'foto_calon' => 'required|image|max:1024',
            'visi' => 'required',
            'misi' => 'required'
        ];
    }
}
