<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\MyController;
use App\Http\Logic\NodeLogic;
use App\Http\Logic\TopicLogic;
use App\Http\Logic\UserLogic;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class TopicController extends MyController
{
    public function index() {

    }


    public function add() {
        // 获取已选择过的分类名称
        $nodeId = Input::get('node_id') ? Input::get('node_id') : 0;
        $data['cate'] = DB::table('nodes')->where('node_id', $nodeId)->first();
        $data['title'] = '发表话题';
        if(!UserLogic::isLogin()) {
            return redirect('user/login');
        }
        $uid = session('uid');
        $user = User::find($uid);
        // 权限判断
        if($nodeId) {
            if(!TopicLogic::isUserPermitted($uid, $nodeId)) {
                $this->showMessage('您无权在此节点发表话题!请重新选择节点');
            }
        }
        $data['category'] = NodeLogic::getAllCates();
        return view('home.topic_add', $data);
    }

    public function checkAddTopic() {

    }
}
