<?php
/**
 * User: mh
 * Date: 2016/7/17
 * Time: 20:56
 */

namespace App\Http\Logic;


use Illuminate\Support\Facades\DB;

class LinkLogic
{
    public function getLatestLinks($limit = '')
    {
        return DB::table('links')->where(array('is_hidden'=>0))
            ->take($limit)->get();
    }
}