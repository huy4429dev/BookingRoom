<?php

namespace App\Http\Controllers\Admin\BlogManage;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::all();
        return view('admin.Blog.index', compact("posts"));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'description' => 'required',
            'content' => 'required',
            'thumbnail' => 'required'
        ], [
            'title.required' => 'tiêu đề không được trống',
            'title.max'      => 'tiêu đề không được quá 50 ký tự',
            'description.required' => 'mô tả không được để trống',
            'content.required' => 'nội dung không được để trống',
            'thumbnail.required' => 'ảnh không được để trống'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 404);
        }
        $post = new BlogPost();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->user_id = Auth::id();
        $post->status = $request->status;
        $post->save();
        return response()->json([
            'success' => [
                'title' => $request->title,
                'content' => $request->content,
                'description' => $request->description,
                'thumbnail' => $request->thumbnail,
                'id' => $post->id,
                'created_at' => $post->created_at,
                'status' => $request->status
            ]
        ], 200);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            $file->move("uploads/images", $hinh);
            return response()->json([
                'url' => $hinh
            ], 200);
        }
    }

    public function detail($id)
    {
        $post = BlogPost::find($id);
        return view('admin.blog.detail', ['post' => $post]);
    }
    public function delete($id)
    {
        $post = BlogPost::findOrFail($id);
        if ($post->thumbnail > 0) {
            unlink("uploads/images/" . $post->thumbnail);
        }
        $post->delete();
        return response()->json(["success" => $post]);
    }
    public function show($id)
    {
        $post = BlogPost::findOrFail($id);
        return response()->json(["success" => $post]);
    }

    public function uploadEdit(Request $request, $id)
    {
        if ($request->hasFile('thumbnail')) {
            $post = BlogPost::findOrFail($id);
            if ($post->thumbnail > 0) {
                unlink("uploads/images/" . $post->thumbnail);
            }
            $file = $request->file('thumbnail');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            $file->move("uploads/images", $hinh);
            return response()->json([
                'url' => $hinh
            ], 200);
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:50',
            'description' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'tiêu đề không được trống',
            'title.max'      => 'tiêu đề không được quá 50 ký tự',
            'description.required' => 'mô tả không được để trống',
            'content.required' => 'nội dung không được để trống'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 404);
        }
        $post = BlogPost::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->content = $request->content;
        $post->thumbnail = $request->thumbnail;
        $post->user_id = $post->user_id;
        $post->status = $request->status;
        $post->save();
        return response()->json([
            'success' => [
                'title' => $request->title,
                'content' => $request->content,
                'description' => $request->description,
                'thumbnail' => $request->thumbnail,
                'id' => $post->id,
                'created_at' => $post->created_at,
                'status' => $request->status
            ]
        ], 200);
    }
}
