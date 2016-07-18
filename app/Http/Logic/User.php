<?php
/**
 * User: mh
 * Date: 2016/7/18
 * Time: 8:04
 */

namespace App\Http\Logic;


use Illuminate\Support\Facades\DB;

class User
{
    /**
     * 获取最新用户名字
     * @param $uid
     * @return mixed
     */
    public function getLatestUserName($uid) {
        $res = DB::table('users')->select('username')
            ->where('uid', $uid)->first();
        return $res['username'];
    }

    public function getUsers($limit, $ord) {
        if($ord == 'new') {
            $obj = 'uid';
        }
        if($ord == 'hot') {
            $obj = 'lastlogin';
        }
        return DB::table('users')
            ->select('uid', 'username', 'avatar')
            ->take($limit)
            ->orderBy($obj)
            ->get();
    }
}