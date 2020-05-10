<?php

namespace App\Http\Controllers\Admin\BlogManage;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = BlogPost::all();
        return view('admin.blog.index',['posts' => $posts]);
    }

    public function create(){
        return view('admin.blog.create');
    }

    public function save(Request $request){

        $success = BlogPost::create($request->all());
        if($success){
            return 'luu bai viet thanh cong';
        }
    }

    public function detail($id){
        
        $post = BlogPost::find($id);
        return view('admin.blog.detail',['post' => $post]);
    }
}
