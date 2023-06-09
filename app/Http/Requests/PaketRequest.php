<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaketRequest extends FormRequest
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
        if (request('nama_paket') === request('paket')) {
            $paket = 'required';
        }else {
            $paket = 'required|unique:pakets,nama_paket|string';
        };
        return [
            'nama_paket' => $paket,
            'batas_waktu' => 'required',
            'harga' => 'required'
        ];
    }
}
