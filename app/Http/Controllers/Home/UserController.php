<?php

namespace App\Http\Controllers\Home;

use App\Http\Logic\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        $data['title'] = '用户';
        $data['new_users'] = (new User())->getUsers(30, 'new');
        $data['hot_users'] = (new User())->getUsers(30, 'hot');
        return view('home.user', $data);
    }

    public function login()
    {

    }

    public function register()
    {

    }


}
