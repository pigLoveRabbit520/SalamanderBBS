<?php

namespace App\Providers;

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
//            $userinfo= $this->db->select('notices,messages_unread')->where('uid',$this->session->userdata('uid'))->get('users')->row_array();
//            $data['myinfo']=array(
//                'uid'=>$this->session->userdata('uid'),
//                'username'=>$this->session->userdata('username'),
//                'avatar'=>$this->session->userdata('avatar'),
//                'group_type'=>$this->session->userdata('group_type'),
//                'gid'=>$this->session->userdata('gid'),
//                'group_name'=>$this->session->userdata('group_name'),
//                'is_active'=>$this->session->userdata('is_active'),
//                'favorites'=>$this->session->userdata('favorites'),
//                'follows'=>$this->session->userdata('follows'),
//                'credit'=>$this->session->userdata('credit'),
//                'notices'=>@$userinfo['notices'],
//                'messages_unread'=>@$userinfo['messages_unread'],
//                'lastpost'=>$this->session->userdata('lastpost')
//            );
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
