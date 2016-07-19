<?php
/**
 * User: mh
 * Date: 2016/7/18
 * Time: 20:42
 */

namespace App\Http\Logic;


use Illuminate\Support\Facades\DB;

class Tag {
    // tag分页列表，用Laravel分页类
    public function getTagList($limit)
    {
        return DB::table('tags')
            ->orderBy('tag_id','desc')
            ->paginate($limit);
    }
}