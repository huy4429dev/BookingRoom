<?php

namespace App\Http\Controllers\Admin\UserManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class staffController extends Controller
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
            ->where('role_id', 2)
            ->get();
        return view('admin.UserManager.StaffRoom.index', compact('adminUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.UserManager.StaffRoom.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->Validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required'
        ], [
            'name.required' => 'tên không được trống',
            'email.required' => 'email không được trống',
            'email.email' => 'email không đúng định dạng',
            'phone.required' => 'điện thoại không được trống',
            'address.required' => 'địa chỉ không được trống',
            'password.required' => 'mật khẩu không được trống',
         
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->email =  $request->email;
        $user->save();
        $user->assignRole(['staff']);
       return redirect('admin/user/staff');
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
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            "success" => $user
        ]);
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

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'phone' => 'required',
            'address' => 'required|min:5',
        ], [
            'name.required' => 'tên không được trống',
            'name.max'      => 'tên không được quá 20 ký tự',
            'phone.required' => 'điện thoại không được để trống',
            'address.required' => 'địa chỉ không được để trống',
            'address.min' => 'địa chỉ phải có ít nhất 5 ký tự',

        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 404);
        }
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->save();
        return response()->json([
            'success' => [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            "success" => "Xóa user thành công"
        ]);
    }
}
