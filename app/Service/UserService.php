<?php
/**
 * User: salamander
 * Date: 2017/5/1
 * Time: 17:44
 */

namespace App\Service;


use App\Models\User;

class UserService
{
    // 用户id
    public $uid = null;
    // 用户数据
    public $udata = null;


    /**
     * 判断用户是否登录，如果是写入登录信息
     * @return bool
     */
    public function isLogin() {
        $uid = session('uid');
        if($uid) {
            $this->uid = $uid;
            $this->udata = User::find($uid);
            return true;
        } else {
            return false;
        }
    }
}