<?php

namespace App\Http\Service;


use Illuminate\Support\Facades\DB;

class Topic
{
    // 贴子列表，无分页
    public function getTopicsListNoPage ($limit) {
        $res = DB::table('topics')->select('topics.*', 'b.username',
            'b.avatar', 'c.username as rname', 'd.cname')
            ->where('topics.is_hidden', 0)
            ->leftJoin('users as b', 'b.uid', '=', 'topics.uid')
            ->leftJoin('users as c', 'c.uid', '=', 'topics.ruid')
            ->leftJoin('nodes as d', 'd.node_id', '=', 'topics.node_id')
            ->orderBy('ord', 'desc')
            ->take($limit)->get();
        return $res;
    }
}