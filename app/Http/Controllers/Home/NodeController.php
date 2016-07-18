<?php

namespace App\Http\Controllers\Home;

use App\Http\Service\Node;
use App\Http\Service\Topic;
use App\Http\Service\User;

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
        $data['catelist'] = (new Node())->getAllCates();
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
            $nodeIds = implode(',',@$nodeIds);//原生态的sql时用到
            $data['topic_list']= (new Topic())->getTopicsListByNodeIds($num, @$nodeIds);

            if($data['topic_list'])
                foreach( $data['topic_list'] as $v ) {
                    $data['new_topic'][$v['node_id']][]=$v;
                }
        }
        // 最新会员列表
        $data['new_users'] = (new User())->getUsers(15, 'new');
        // 最新贴子列表
        $data['new_topics'] = (new Topic())->getLatestTopics(10);
        // action
        $data['action'] = 'node';
        return view('home.node_index', $data);
    }


}
