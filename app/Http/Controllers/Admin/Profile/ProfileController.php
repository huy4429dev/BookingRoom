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
    public function edit(request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required',
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'phone.required' => 'Bạn chưa nhập số điện thoại',
                'email.required' => 'Bạn chưa nhập email',
                'address.required' => 'Bạn chưa nhập địa chỉ',
                'email.email' => 'email không đứng định dạng'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 404);
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        if ($request->img != '') {
            $user->avatar = $request->img;
        }
        if ($request->password != null) {
            $validator1 = Validator::make(
                $request->all(),
                [
                    'password' => 'required',
                    'passwordSame' => 'required|same:password',
                ],
                [
                    'password.required' => 'Bạn chưa nhập password',
                    'passwordSame.required' => 'Bạn chưa nhập lại password',
                    'passwordSame.same' => 'password nhập lại chưa chính xác',
                ]

            );
            if ($validator1->fails()) {
                return response()->json(['error' => $validator1->errors()->all()], 404);
            }
            $user->password = bcrypt($request->password);
        }
        $user->save();
        return response()->json([
            "success" => $user
        ]);
    }
}
