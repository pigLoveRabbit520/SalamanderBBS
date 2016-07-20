<?php

namespace App\Http\Controllers\Home;

use App\Http\Logic\NodeLogic;
use App\Http\Logic\TopicLogic;
use App\Http\Logic\UserLogic;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NodeController extends Controller
{
    public function index() {
        $data['title'] = '版块列表';
        $stats = DB::table('site_stats')->where('item', 'total_topics')->get();
        $data['stats']['total_topics'] = @$stats['value'];
        // 获取版块列表
        $data['catelist'] = (new NodeLogic())->getAllCates();
        // 获取node_ids数据
        if($data['catelist']) {
            foreach($data['catelist'] as $k => $v){
                $c[$k] = $v;
                foreach($c[$k] as $k1 => $d){
                    $nodeIds[] = $d['node_id'];
                }
            }
        }
        if(@$nodeIds){
            $num = count(@$nodeIds);
            $data['topic_list']= (new TopicLogic())->getTopicsListByNodeIds($num, @$nodeIds);
            if($data['topic_list'])
                foreach( $data['topic_list'] as $v ) {
                    $data['new_topic'][$v['node_id']][] = $v;
                }
        }
        // 最新会员列表
        $data['new_users'] = (new UserLogic())->getUsers(15, 'new');
        // 最新贴子列表
        $data['new_topics'] = (new TopicLogic())->getLatestTopics(10);
        return view('home.node_index', $data);
    }

    public function show() {

    }


}
