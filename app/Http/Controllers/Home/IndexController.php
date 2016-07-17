<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\Link;
use App\Http\Service\Node;
use App\Http\Service\Topic;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class IndexController extends BaseController
{
    public function show() {
        $homePageNum = Config::get('home_page_num') ? Config::get('home_page_num') : 20;
        $data['topic_list'] = (new Topic())->getTopicsListNoPage($homePageNum);
        $data['catelist'] = (new Node())->getAllCates();
        $stats = DB::table('site_stats')->get();
        $data['stats'] = array_column($stats, 'value', 'item');
        $data['last_user']= DB::table('users')->select('username')
                ->where('uid',@$data['stats']['last_uid'])->get();
        $data['stats']['last_username']=@$data['last_user']['username'];
        $data['links'] = (new Link())->getLatestLinks();
        return view('home.home', $data);
    }

}
