<?php
/**
 * User: mh
 * Date: 2016/7/18
 * Time: 20:42
 */

namespace app\Http\Logic;


use Illuminate\Support\Facades\DB;

class Tag {
    // tag分页列表
    public function getTagList($page, $limit)
    {
        return DB::table('tags')
            ->orderBy('tag_id','desc')
            ->skip($page)
            ->take($limit)->get();
    }
}