<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

class BaseController extends Controller
{
    var $nodes	= '';
    var $pages = '';
    function __construct() {
        //判断关闭
        if(Config::get('website.site_close') == 'off') {
            //show_error($this->config->item('site_close_msg'),500,'网站关闭');
        }
//


//        $data['page_links'] = $this->page_m->get_page_menu(10,0);
//        //模板目录
//        $data['themes']=base_url('static/'.$this->config->item('themes').'/');
//        //全局输出
//        $this->load->vars($data);
    }
}
