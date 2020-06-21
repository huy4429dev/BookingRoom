<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\District;
use App\Models\Motelroom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{

   public function register(Request $req)
   {

      $validator = Validator::make($req->all(), [

         'txtemail'   => 'required|email|unique:users,email',
         'txtpass'   => 'required|min:6',
         'txtRepass' => 'required|same:txtpass',
         'txtname'   => 'required'

      ], [

         'txtemail.unique'     => 'Email đã tồn tại trên hệ thống',
         'txtemail.required'   => 'Vui lòng nhập Email',
         'txtpass.required'   => 'Vui lòng nhập mật khẩu',
         'txtpass.min'        => 'Mật khẩu phải lớn hơn 6 kí tự',
         'txtRepass.required' => 'Vui lòng nhập lại mật khẩu',
         'txtRepass.same'     => 'Mật khẩu nhập lại không trùng khớp',
         'txtname.required'   => 'Nhập tên hiển thị'
      ]);


      if ($validator->fails()) {
         return response()->json(['registerErr' => $validator->errors()->all()], 404);
      }


      $newuser = new User;
      $newuser->name = $req->txtname;
      $newuser->password = bcrypt($req->txtpass);
      $newuser->email = $req->txtemail;
      $newuser->save();

      $newuser->assignRole(['room master']);

      return response()->json('registerSuccess');
   }


   public function login(Request $req)
   {
      $validator = Validator::make($req->all(), [

         'txtemail' => 'required',
         'txtpass' => 'required',

      ], [
         'txtemail.required' => 'Vui lòng nhập tài khoản',
         'txtpass.required' => 'Vui lòng nhập mật khẩu'

      ]);

      if ($validator->fails()) {
         return response()->json(['loginErr' => $validator->errors()->all()], 404);
      }


      if (Auth::attempt(['email' => $req->txtemail, 'password' => $req->txtpass])) {

         return response()->json('loginSuccess');
      } else
         return response()->json(['loginErr' => ['Tài khoản hoặc mật khẩu không chính xác !']], 404);
   }


   public function createPost()
   {
      $district = District::all();
      $categories = Categories::all();
      return view('create_post', [
         'district' => $district,
         'categories' => $categories
      ]);
   }


   
   public function  storePost(Request $request)
   {

      $request->validate(
         [
            'txttitle' => 'required',
            'txtaddress' => 'required',
            'txtprice' => 'required',
            'txtarea' => 'required',
            'txtphone' => 'required',
            'txtdescription' => 'required',
            'txtaddress' => 'required',
         ],
         [
            'txttitle.required' => 'Nhập tiêu đề bài đăng',
            'txtaddress.required' => 'Nhập địa chỉ phòng trọ',
            'txtprice.required' => 'Nhập giá thuê phòng trọ',
            'txtarea.required' => 'Nhập diện tích phòng trọ',
            'txtphone.required' => 'Nhập SĐT chủ phòng trọ (cần liên hệ)',
            'txtdescription.required' => 'Nhập mô tả ngắn cho phòng trọ',
            'txtaddress.required' => 'Nhập hoặc chọn địa chỉ phòng trọ trên bản đồ'
         ]
      );

      /* Check file */
      $json_img = "";
      if ($request->hasFile('hinhanh')) {
         $arr_images = array();
         $inputfile =  $request->file('hinhanh');
         foreach ($inputfile as $filehinh) {
            $namefile = "phongtro-" . Str::random(5) . "-" . $filehinh->getClientOriginalName();
            while (file_exists('uploads/images' . $namefile)) {
               $namefile = "phongtro-" . Str::random(5) . "-" . $filehinh->getClientOriginalName();
            }
            $arr_images[] = $namefile;
            $filehinh->move('uploads/images', $namefile);
         }
         $json_img =  json_encode($arr_images, JSON_FORCE_OBJECT);
      } else {
         $arr_images[] = "no_img_room.png";
         $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
      }

      /* tiện ích*/

      $json_tienich = json_encode($request->tienich, JSON_FORCE_OBJECT);
      /* ----*/
      /* get LatLng google map */

      $arrlatlng = array();
      $arrlatlng[] = $request->txtlat;
      $arrlatlng[] = $request->txtlng;
      $json_latlng = json_encode($arrlatlng, JSON_FORCE_OBJECT);

      /* --- */
      /* New Phòng trọ */
      $motel = new Motelroom();
      $motel->title = $request->txttitle;
      $motel->description = $request->txtdescription;
      $motel->price = $request->txtprice;
      $motel->area = $request->txtarea;
      $motel->count_view = 0;
      $motel->address = $request->txtaddress;
      $motel->latlng = $json_latlng;
      $motel->utilities = $json_tienich;
      $motel->images = $json_img;
      $motel->user_id = Auth::user()->id;
      $motel->category_id = $request->idcategory;
      $motel->district_id = $request->iddistrict;
      $motel->phone = $request->txtphone;
      $motel->save();
      return redirect('/user/post')->with('success', 'Đăng tin thành công. Vui lòng đợi Admin kiểm duyệt');
   }


   public function editPost($slug)
   {
      $post =  Motelroom::findBySlug($slug);
      if(!$post == null){
         $post = $post->where('user_id', Auth::user()->id)->where('slug',$slug)->first();
         $district = District::all();
         $categories = Categories::all();

         foreach($post->roomguest as $item){
            $item->watched = true;
            $item->save();
         }

         return view('edit_post', [
            'district' => $district,
            'categories' => $categories,
            'post' => $post,
         ]);
      }
      return "404 NOT FOUND";
   }

   public function profile()

   {
      $mypost = Motelroom::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
      return view('user_profile', [
         'mypost' => $mypost,
      ]);
   }

   public function editProfile(Request $req)
   {
      $validator = Validator::make($req->all(), [

         'name'   => 'required',

      ], [
         'name'   => 'Nhập tên hiển thị'
      ]);


      if ($validator->fails()) {
         return response()->json(['updateErrors' => $validator->errors()->all()], 404);
      }


      $user = User::find(Auth::user()->id);

      $user->name = $req->name;
      $user->address = $req->address;
      $user->phone = $req->phone;
      
      
      if ($req->email != $user->email) {
         $validator = Validator::make($req->all(), [
            'email'   => 'required|email|unique:users,email',
         ], [
            'email.unique'     => 'Email đã tồn tại trên hệ thống',
            'email.required'   => 'Vui lòng nhập Email',
         ]);

         if ($validator->fails()) {
            return response()->json(['updateErrors' => $validator->errors()->all()], 404);
         }

         $user->email = $req->email;
      }

      if ($req->password != '') {

         $validator = Validator::make($req->all(), [
            'password' => 'min:6|max:32',
            'password' => 'same:txtpass',
         ], [
            'password.min' => 'mật khẩu phải lớn hơn 6 và nhỏ hơn 32 kí tự',
            'password.max' => 'mật khẩu phải lớn hơn 6 và nhỏ hơn 32 kí tự'
         ]);

         if ($validator->fails()) {
            return response()->json(['updateErrors' => $validator->errors()->all()], 404);
         }

         $user->password = bcrypt($req->password);
      }

      $user->save();

      return response()->json('updateSuccess');
   }

   public function editProfileAvatar(Request $request)
   {

      if ($request->hasFile('avatar')) {
         $file = $request->file('avatar');
         $name = $file->getClientOriginalName();
         $avatar = Str::random(4) . "_" . $name;
         $file->move("uploads/images", $avatar);

         $avatar = 'uploads/images/'.$avatar;

         $user = Auth::user();
         $user->avatar = $avatar;
         $user->save();

         return response()->json([
            'url' => $avatar
         ], 200);
      }
   }



   public function getEditprofile()
   {
      $user = User::find(Auth::user()->id);
      $categories = Categories::all();
      return view('home.edit-profile', [
         'categories' => $categories,
         'user' => $user
      ]);
   }
   public function postEditprofile(Request $request)
   {
      $categories = Categories::all();
      $user = User::find(Auth::id());
      if ($request->hasFile('avtuser')) {
         $file = $request->file('avtuser');
         var_dump($file);
         $exten = $file->getClientOriginalExtension();
         if ($exten != 'jpg' && $exten != 'png' && $exten != 'jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten != 'JPEG')
            return redirect('user/profile/edit')->with('thongbao', 'Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
         $Hinh = 'avatar-' . $user->username . '-' . time() . '.' . $exten;
         while (file_exists('uploads/avatars/' . $Hinh)) {
            $Hinh = 'avatar-' . $user->username . '-' . time() . '.' . $exten;
         }
         if (file_exists('uploads/avatars/' . $user->avatar))
            unlink('uploads/avatars/' . $user->avatar);

         $file->move('uploads/avatars', $Hinh);
         $user->avatar = $Hinh;
      }
      $this->validate($request, [
         'txtname' => 'min:3|max:20'
      ], [
         'txtname.min' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự',
         'txtname.max' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự'
      ]);
      if (($request->txtpass != '') || ($request->retxtpass != '')) {
         $this->validate($request, [
            'txtpass' => 'min:3|max:32',
            'retxtpass' => 'same:txtpass',
         ], [
            'txtpass.min' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
            'txtpass.max' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
            'retxtpass.same' => 'Nhập lại mật khẩu không đúng',
            'retxtpass.required' => 'Vui lòng nhập lại mật khẩu',
         ]);
         $user->password = bcrypt($request->txtpass);
      }

      $user->name = $request->txtname;
      $user->save();
      return redirect('user/profile/edit')->with('thongbao', 'Cập nhật thông tin thành công');

      // return view('home.edit-profile',[
      //    'categories'=>$categories,
      //    'user'=> $user
      // ]);
   }
}
