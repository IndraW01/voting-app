<?php

namespace App\Http\Requests;

use App\Models\Admin\Pemilih;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdatePemilihRequest extends FormRequest
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
        $nimValid = Pemilih::has('voting')->pluck('nim')->toArray();

        return [
            'vote.*' => ['distinct', Rule::in($nimValid)]
        ];
    }

    public function messages()
    {
        return [
            'vote.*.in' => 'Nim Tidak Valid',
            'vote.*.distinct' => 'Nim Tidak boleh Ada yang sama',
        ];
    }
}
