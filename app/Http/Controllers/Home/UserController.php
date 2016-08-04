<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\MyController;
use App\Http\Logic\UserLogic;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
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
        return view('home.register')->with('title', '注册新用户');
    }

    /**
     * 验证用户注册参数
     */
    public function checkRegInfo() {
        Input::merge(array_map('trim', Input::all()));
        $request = new UserRequest();
        $validator = Validator::make(Input::all(),
            $request->getRegisterRules(), $request->messages());
        $request->setCaptcha($validator);
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
                return redirect('user/login');
            } else {
                return $this->showMessage('注册失败');
            }
        }
    }

    public function login() {
        if(UserLogic::isLogin()) {
            return redirect()->back();
        }
        $data['title'] = '用户登录';
        return view('home.login', $data);
    }

    /**
     * 验证登录参数
     */
    public function checkLogin() {
        if(UserLogic::isLogin()) {
            return redirect()->back();
        }
        Input::merge(array_map('trim', Input::all()));
        $request = new UserRequest();
        $validator = Validator::make(Input::all(),
            $request->getLoginRules(), $request->messages());
        $request->setCaptcha($validator);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $email = Input::get('email');
            $password = Input::get('password');
            if( (new UserLogic())->verifyUser($email, $password) ) {
                $user = User::where('email', $email)->first();
                UserLogic::login($user->uid);
                DB::beginTransaction();
                try {
                    // 更新积分
                    if(time() - $user->lastlogin > 86400){
                        $user->lastlogin = $user->lastlogin + Config::get('userset.credit_login');
                    }
                    $user->lastlogin = time();
                    $user->save();
                    DB::commit();
                    return redirect('/');
                } catch (Exception $e) {
                    DB::rollback();
                    throw $e;
                }
            } else {
                return $this->showMessage('用户名或邮箱错误!!');
            }
        }
    }

    // 登出
    public function logout () {
        UserLogic::logout();
        return redirect('user/login');
    }

    // 显示个人简介
    public function showProfileSettings() {
        $uid = session('uid');
        $data = User::find($uid);
        $data['title'] = '账户设置';
        return view('home.settings_profile', $data);
    }

    // 显示头像设置
    public function showAvatarSettings() {
        $data['title'] = '头像设置';
        $data['msg'] = '';
        return view('home.settings_avatar',$data);
    }

    // 显示密码
    public function showPassowrdSettings() {
        return view('home.settings_password')->with('title',  '修改密码');
    }
}
