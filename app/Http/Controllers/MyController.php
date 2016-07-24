<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class MyController extends Controller
{
    function __construct() {
        //判断关闭
        if(Config::get('website.site_close') == 'off') {
            //show_error($this->config->item('site_close_msg'),500,'网站关闭');
        }
//
        $res = DB::table('settings')->get();
        $data['settings'] = array(
            'site_name'=> $res[0]['value'],
            'welcome_tip'=> $res[1]['value'],
            'short_intro'=> $res[2]['value'],
            'show_captcha'=> $res[3]['value'],
            'site_run'=> $res[4]['value'],
            'site_stats'=> $res[5]['value'],
            'site_keywords'=> $res[6]['value'],
            'site_description'=> $res[7]['value'],
            'money_title'=> $res[8]['value'],
            'per_page_num'=> $res[9]['value'],
            'logo'=> Config::get('website.logo')
        );
        // 用户相关信息
        if (session('uid')) {
            $userinfo = User::find(session('uid'));
            $data['myinfo']=array(
                'uid'=> session('uid'),
                'nickname'=> session('nickname'),
                'avatar'=> session('avatar'),
                'group_type'=> session('group_type'),
                'gid'=> session('gid'),
                'group_name'=> session('group_name'),
                'is_active'=> @$userinfo['is_active'],
                'favorites'=>  @$userinfo['favorites'],
                'follows'=> @$userinfo['follows'],
                'credit'=>  @$userinfo['credit'],
                'notices'=> @$userinfo['notices'],
                'messages_unread'=>@$userinfo['messages_unread'],
                'lastpost'=> session('lastpost')
            );
        }
        view()->share($data);
    }

    protected function showMessage($message= '', $url = '', $status = 2, $heading = '提示信息', $time = 2000) {
        $data = [
            'message' => $message,
            'url' => $url,
            'status' => $status,
            'heading' => $heading,
            'time' => $time
        ];
        return view('errors.message', $data);
    }
}
