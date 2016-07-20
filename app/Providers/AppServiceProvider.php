<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
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
            $userinfo = User::where('uid', session('uid'))
               ->first();
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

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
