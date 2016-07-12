<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Route;

class IndexController extends BaseController
{
    public function show() {
        return view('home.home');
    }

    public function get(Request $request) {

    }
}
