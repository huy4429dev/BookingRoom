<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view(
            'blog',
            [
                'news' => BlogPost::orderBy('id', 'desc')->paginate(3)
            ]
        );
    }

    public function detail($id){
        return view('blog_detail', [ 
             'new' =>  BlogPost::find($id)  
        ]);
    }
}
