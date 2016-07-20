<?php

namespace App\Http\Controllers\Home;

use App\Http\Logic\UserLogic;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index() {
        $data['title'] = '用户';
        $data['new_users'] = (new UserLogic())->getUsers(30, 'new');
        $data['hot_users'] = (new UserLogic())->getUsers(30, 'hot');
        return view('home.user', $data);
    }

    public function login() {

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
        $v = Validator::make(Input::all(),
            (new RegisterRequest())->rules());
        if ($v->fails()) {
            set_api_response(1, "注册失败", $v->messages());
        } else {

        }
    }


}
