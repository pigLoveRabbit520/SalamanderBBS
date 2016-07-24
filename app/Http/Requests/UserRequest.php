<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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

    }

    /**
     * 注册验证规则
     * @return array
     */
    public function getRegisterRules() {
        return [
            'nickname' => 'required|min:2|max:20|unique:users',
            'email' => 'required|min:5|max:50|email|unique:users',
            'password' => 'required|min:6|max:18|alpha_num',
            'password_confirm' => 'required|same:password',
        ];
    }

    /**
     * 登录验证规则
     * @return array
     */
    public function getLoginRules() {
        return [
            'email' => 'required|min:5|max:50|email|unique:users',
            'password' => 'required|min:6|max:18|alpha_num',
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute必填',
            'email' => '邮箱格式错误！',
            'alpha_num' => ':attribute必须由数字和字母组成',
            'nickname.unique' => '昵称有人家用了哈',
            'unique' => '邮箱已注册',
            'password_confirm.same' => '两次密码不一致',
            'captcha.captcha' => '验证码错误，请重试',
        ];
    }
}