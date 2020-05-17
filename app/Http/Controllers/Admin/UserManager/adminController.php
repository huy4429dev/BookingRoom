<?php

namespace App\Http\Controllers\Admin\UserManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUser = DB::table('Users')
            ->select('*')
            ->join('model_has_roles', 'model_has_roles.model_id', '=', 'Users.id')
            ->where('role_id', 1)
            ->get();
        return view('admin.UserManager.AdminRoom.index', compact('adminUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.UserManager.AdminRoom.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $this->validate(
        //     $request,
        //     [
        //         'name' => 'required|max:50',
        //         'email' => 'required,email|unique:users',
        //         'address' => "required",
        //         'phone' => 'required|min:11|numeric'
        //     ],
        //     [
        //         'name.required' => 'Bạn chưa nhập tên',
        //         'name.required' => 'Tên không quá 50 ký tự',
        //         'email.required' => 'Bạn chưa nhập email',
        //         'email.email' => 'Email không đúng định dạng',
        //         'email.unique' => 'Email đã tồ tại',
        //         'address.required' => 'Bạn chưa nhập địa chỉ',
        //         'phone.required' => 'Bạn chưa nhập số điện thoại',
        //         'phone.min' => 'Số điẹn thoại có ít nhất 11 ký tự',
        //         'phone.numeric' => 'Số điện thoại phải là số',

        //     ]
        // );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            "success" => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // $adminUser = User::findOrFail($id);
        // $this->validate(
        //     $request,
        //     [
        //         'name' => 'required|max:50',
        //         'email' => 'required,email|unique:users',
        //         'address' => "required",
        //         'phone' => 'required|min:11|numeric'
        //     ],
        //     [
        //         'name.required' => 'Bạn chưa nhập tên',
        //         'name.required' => 'Tên không quá 50 ký tự',
        //         'email.required' => 'Bạn chưa nhập email',
        //         'email.email' => 'Email không đúng định dạng',
        //         'email.unique' => 'Email đã tồ tại',
        //         'address.required' => 'Bạn chưa nhập địa chỉ',
        //         'phone.required' => 'Bạn chưa nhập số điện thoại',
        //         'phone.min' => 'Số điẹn thoại có ít nhất 11 ký tự',
        //         'phone.numeric' => 'Số điện thoại phải là số',
        //     ]
        // );
        // return view("admin.UserManager.AdminRoom.detail", compact("adminUser"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
