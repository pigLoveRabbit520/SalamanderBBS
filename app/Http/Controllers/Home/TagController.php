<?php

namespace App\Http\Controllers\Home;

use app\Http\Logic\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TagController extends Controller
{
    public function index($page = 1) {
        $limit = 30;
        $start = ($page-1) * $limit;
        $data['pagination'] = $this->pagination->create_links();
        $data['tag_list'] = (new Tag())->getTagList($start, $limit);
        $data['title'] = "标签列表";
        return view('home.tag_index', $data);
    }

}
