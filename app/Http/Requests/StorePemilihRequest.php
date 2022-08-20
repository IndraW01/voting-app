<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StorePemilihRequest extends FormRequest
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
            'username' => 'required|max:50|' . Rule::unique('users'),
            'email' => 'required|max:100|email',
            'nama' => 'required|max:50',
            'nim' => 'required|min:10|max:10|' . Rule::unique('pemilihs'),
            'angkatan' => 'required|' . Rule::in(['2019', '2020', '2021', '2022']) ,
            'kelas' => 'required|' . Rule::in(['A', 'B', 'C']),
            'foto_pemilih' => 'required|image|max:1024',
            'password' => 'required|max:100|min:3|alpha_num',
        ];
    }
}
