<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\MyController;
use App\Http\Logic\LinkLogic;
use App\Http\Logic\NodeLogic;
use App\Http\Logic\TopicLogic;

use App\Http\Requests;
use App\Http\Logic\UserLogic;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class IndexController extends MyController
{
    public function index() {
        $homePageNum = Config::get('home_page_num') ? Config::get('home_page_num') : 20;
        $data['topic_list'] = (new TopicLogic())->getTopicsListNoPage($homePageNum);
        $data['catelist'] = (new NodeLogic())->getAllCates();
        $stats = DB::table('site_stats')->get();
        $data['stats'] = array_column($stats, 'value', 'item');
        $username = (new UserLogic())->getLatestUserName($data['stats']['last_uid']);
        $data['stats']['last_username'] = $username;
        $data['links'] = (new LinkLogic())->getLatestLinks();
        return view('home.home', $data);
    }

}
