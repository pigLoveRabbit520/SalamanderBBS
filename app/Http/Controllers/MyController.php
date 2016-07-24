<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Config;

class MyController extends Controller
{
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
