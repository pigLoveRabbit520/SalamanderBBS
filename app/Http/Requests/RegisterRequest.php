<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegisterRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nickname' => 'required|min:5|max:50|email|unique:users',
            'email' => 'required|min:5|max:50|email|unique:users',
            'password' => 'required|min:6|max:18|alpha_num',
            'password_confirm' => 'required|same:password',
            'captcha_code' => 'required|size:4|alpha_num|'
        ];
    }
}