<?php

namespace App\Http\Controllers;

use App\Http\Logic\UserLogic;
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
        if (UserLogic::isLogin()) {
            $user = User::find(session('uid'));
            $group = $user->belongsToGroup;
            $data['myinfo'] = array(
                'uid'=> session('uid'),
                'nickname'=> @$user['nickname'],
                'avatar'=> @$user['avatar'],
                'group_type'=> $group['group_type'],
                'gid'=> @$user['gid'],
                'group_name' => $group['group_name'],
                'is_active'=> @$user['is_active'],
                'favorites'=>  @$user['favorites'],
                'follows'=> @$user['follows'],
                'credit'=>  @$user['credit'],
                'notices'=> @$user['notices'],
                'messages_unread'=>@$user['messages_unread'],
                'lastpost'=> session('lastpost')
            );
        }
        view()->share($data);
    }

    /**
     * 显示错误信息
     * @param string $message
     * @param string $url
     * @param int $status
     * @param string $heading
     * @param int $time
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
