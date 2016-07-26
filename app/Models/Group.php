<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'user_groups';

    protected $primaryKey = 'gid';

    // 关闭时间戳
    public $timestamps = false;

    // 黑名单
    protected $guarded = ['uid'];
}
