<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.Profile.index');
    }
    public function getProfile($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            "success" => $user
        ]);
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $name = $file->getClientOriginalName();
            $hinh = Str::random(4) . "_" . $name;
            $file->move("uploads/images", $hinh);
            return response()->json([
                'url' => $hinh
            ], 200);
        }
    }
}
