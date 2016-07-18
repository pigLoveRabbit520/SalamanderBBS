<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index() {
        $limit = 30;
        $start = ($page-1)*$limit;
        $this->load->library('pagination');
        $data['pagination'] = $this->pagination->create_links();
        $data['tag_list'] = $this->tag_m->get_tag_list($start, $limit);
        $data['action']='tag';
        $data['title']="标签列表";
        return view('home.tag_index', $data);
    }

}
