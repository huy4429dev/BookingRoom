<?php

namespace App\Http\Controllers\Admin\ContactManager;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.Contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
            'success' => [
                'username' => $request->username,
                'title' => $request->title,
                'address' => $request->address,
                'content' => $request->content,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => '1'
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json([
            "success" => $contact
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
        $contact = Contact::FindOrFail($id);
        $contact->username = $request->username;
        $contact->title = $request->title;
        $contact->address = $request->address;
        $contact->content = $request->content;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->status = $request->status;
        $contact->save();
        return response()->json([
            'success' => [
                'username' => $request->username,
                'title' => $request->title,
                'address' => $request->address,
                'content' => $request->content,
                'email' => $request->email,
                'phone' => $request->phone,
                'status' => $request->status
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
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return response()->json([
            'success' => 'xóa liên hệ thành công'
        ]);
    }
}
