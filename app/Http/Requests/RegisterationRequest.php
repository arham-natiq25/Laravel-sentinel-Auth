<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterationRequest extends FormRequest
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
            'first_name'=>'required|string|max:255|min:3|alpha',
            'last_name'=>'required|string|max:255|min:3|alpha',
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:8|max:20|confirmed',
        ];
    }
}
