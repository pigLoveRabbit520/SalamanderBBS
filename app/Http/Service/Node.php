<?php
/**
 * User: mh
 * Date: 2016/7/17
 * Time: 20:31
 * StartBBS之Laravel重构
 */

namespace App\Http\Service;


use Illuminate\Support\Facades\DB;

class Node
{
    public function getAllCates()
    {
        $res = DB::table('nodes')
            ->select('node_id','pid','cname','ico','content', 'listnum','master')
            ->orderBy('pid', 'desc')->get();
        if(!empty($res)){
            foreach($res as $k=>$v){
                $cates[$v['pid']][] = $v;
            }
        }
        return @$cates;
    }
}