<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required',
            'title' => 'required',
            'content' => 'required'
        ], [
            'username.required' => 'tên không được trống',
            'email.required' => 'email không được trống',
            'email.email' => 'email không đúng định dạng',
            'address.required' => 'địa chỉ không được để trống',
            'phone.required' => 'điện thoại không được để trống',
            'title.required' => 'tiêu đề không được để trống',
            'content.required' => 'nội dung không được để trống'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()], 404);
        }

        
        $contact = new Contact();
        $contact->username = $request->username;
        $contact->title = $request->title;
        $contact->address = $request->address;
        $contact->content = $request->content;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();
        return response()->json([
            'success' => 'Gửi liên hệ thành công'
        ], 200);



    }
}
