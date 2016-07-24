<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\MyController;
use App\Http\Logic\UserLogic;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends MyController
{
    public function index() {
        $data['title'] = '用户';
        $data['new_users'] = (new UserLogic())->getUsers(30, 'new');
        $data['hot_users'] = (new UserLogic())->getUsers(30, 'hot');
        return view('home.user', $data);
    }

    public function register() {
        if (session('uid')) {
            return redirect('/');
        }
        return view('home.register')->with('title', '注册新用户');
    }

    /**
     * 验证用户注册参数
     */
    public function checkUserInfo() {
        Input::merge(array_map('trim', Input::all()));
        $request = new RegisterRequest();
        $validator = Validator::make(Input::all(),
            $request->rules(), $request->messages());
        $validator->sometimes('captcha',
            'required|size:4|alpha_num|captcha',
            function($input) {
                return Config::get('website.show_captcha');
            }
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $password = Input::get('password');
            $salt = strtolower(str_random(6));
            $data = array(
                'nickname' => strip_tags(Input::get('nickname')),
                'password' => password_dohash($password, $salt),
                'salt' => $salt,
                'email' => Input::get('email'),
                'credit' => Config::get('userset.credit_start'),
                'ip' => get_online_ip(),
                'gid' => 3,
                'reg_time' => time(),
                'is_active' => 1
            );
            $user = User::create($data);
            if($user) {
                return redirect()->intended('/');
            } else {
                return $this->showMessage('注册失败');
            }
        }
    }

    public function login() {
        if(session('uid')) {
            return redirect()->back();
        }
        $data['title'] = '用户登录';
        return view('home.login', $data);

    }


    public function logout () {
        Session::flush();
        return redirect('user/login');
    }


}
