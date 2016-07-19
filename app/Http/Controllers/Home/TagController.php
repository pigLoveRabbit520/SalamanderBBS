<?php

namespace App\Http\Controllers\Home;

use App\Http\Logic\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class TagController extends Controller
{
    public function index() {
        $limit = Config::get('website.per_page_tag_num');
        $data['tags'] = (new Tag())->getTagList($limit);
        $data['title'] = "标签列表";
        return view('home.tag_index', $data);
    }

}
