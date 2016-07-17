<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\Topic;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;

class IndexController extends BaseController
{
    public function show() {
        $homePageNum = Config::get('home_page_num') ? Config::get('home_page_num') : 20;
        $data['topic_list'] = (new Topic())->getTopicsListNoPage($homePageNum);
        return view('home.home', $data);
    }

}
