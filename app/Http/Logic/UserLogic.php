<?php
/**
 * User: mh
 * Date: 2016/7/18
 * Time: 8:04
 */

namespace App\Http\Logic;


use App\Models\User;

class UserLogic
{
    /**
     * 获取最新用户名字
     * @param $uid
     * @return mixed
     */
    public function getLatestUserName($uid) {
        return User::where('uid', $uid)->pluck('username');
    }

    public function getUsers($limit, $ord) {
        if($ord == 'new') {
            $obj = 'uid';
        }
        if($ord == 'hot') {
            $obj = 'lastlogin';
        }
        return User::select(['uid', 'username', 'avatar'])
            ->take($limit)
            ->orderBy($obj)
            ->get();
    }
}