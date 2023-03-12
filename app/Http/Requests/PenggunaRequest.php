<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenggunaRequest extends FormRequest
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
        if (request('username') === request('user')) {
            $username = 'required';
        }else {
            $username = 'required|unique:users,username';
        };

        // $password = request('password') ?? 'required';
        return [
            'name' => 'required',
            'username' => $username,
            'password' => 'required',
            'role' => 'required'
        ];
    }
}
