<?php

namespace App\Http\Controllers\Admin\PostManage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return "posts";
    }
}
