<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Motelroom;
use App\Models\RoomGuest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MotelRoomController extends Controller
{


	public function index()
	{
		$rooms = Motelroom::where('approve', 1)->orderBy('id','desc')->paginate(6);  
		return view('room_index', ['rooms' => $rooms]);
	}

	public function detail($slug)
	{
		$room = Motelroom::findBySlug($slug);
		$room->count_view = $room->count_view + 1;
		$room->save();
		$categories = Categories::all();


		return view('detail',
		 [
			'motelroom'  => $room,
			'categories' => $categories,
		]);
	}

	public function SearchMotelAjax(Request $request)
	{


		$getmotel = Motelroom::where([
			['district_id', $request->id_ditrict],
			['price', '>=', $request->min_price],
			['price', '<=', $request->max_price],
			['category_id', $request->id_category],
			['approve', 1]
		])->get();


		$arr_result_search = array();
		foreach ($getmotel as $room) {
			$arrlatlng = json_decode($room->latlng, true);
			$arrImg = json_decode($room->images, true);
			$arr_result_search[] = ["slug" => $room->slug, "id" => $room->id, "lat" => $arrlatlng[0], "lng" => $arrlatlng[1], "title" => $room->title, "address" => $room->address, "image" => $arrImg[0], "phone" => $room->phone];
		}

		return json_encode($arr_result_search);
	}

	public function user_del_motel($id)
	{
		if (!Auth::check()) {
			return redirect('user/login');
		} else {
			$getmotel = Motelroom::find($id);
			if (Auth::id() != $getmotel->user_id)
				return redirect('user/profile')->with('thongbao', 'Bạn không có quyền xóa bài đăng không phải là của bạn!');
			else {
				$getmotel->delete();
				return redirect('user/profile')->with('thongbao', 'Đã xóa bài đăng của bạn');
			}
		}
	}

	public function getMotelByCategoryId($id)
	{
		$getmotel = Motelroom::where([['category_id', $id], ['approve', 1]])->paginate(3);
		$Categories = Categories::all();
		return view('home.category', ['listmotel' => $getmotel, 'categories' => $Categories]);
	}

	public function addCustomer(Request $request, $slug){
		
		$validator = Validator::make($request->all(), [

			'fullname' => 'required',
			'email'    => 'required',
			'phone'    => 'required',
   
		 ], [
			'fullname' => 'Vui lòng nhập họ tên',
			'email'    => 'Vui lòng nhập email',
			'phone'    => 'Vui lòng nhập số điện thoại',
		 ]);
			
		$roomId = Motelroom::findBySlug($slug)->id; 
		
		 if ($validator->fails()) {
			return response()->json(['createdCustomerError' => $validator->errors()->all()], 404);
		 }
		 
		RoomGuest::create([
			'fullname' => $request->fullname,
			'email'    => $request->email,
			'phone'    => $request->phone,
			'watched'  => false,
			'room_motel_id' => $roomId
		]); 

		return response()->json('createdCustomerSuccess');
	}

	public function updateStatus(Request $request, $id)
	{ 
		$motelRoom  = Motelroom::find($id);
		$motelRoom->status = $request->status;
		$motelRoom->save();

		return response()->json(['updateStatusSuccess' => $motelRoom->status]);
	}

	// public function userReport($id,Request $request){
	// 	$ipaddress = '';
	//     if (getenv('HTTP_CLIENT_IP'))
	//         $ipaddress = getenv('HTTP_CLIENT_IP');
	//     else if(getenv('HTTP_X_FORWARDED_FOR'))
	//         $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	//     else if(getenv('HTTP_X_FORWARDED'))
	//         $ipaddress = getenv('HTTP_X_FORWARDED');
	//     else if(getenv('HTTP_FORWARDED_FOR'))
	//         $ipaddress = getenv('HTTP_FORWARDED_FOR');
	//     else if(getenv('HTTP_FORWARDED'))
	//        $ipaddress = getenv('HTTP_FORWARDED');
	//     else if(getenv('REMOTE_ADDR'))
	//         $ipaddress = getenv('REMOTE_ADDR');
	//     else
	//         $ipaddress = 'UNKNOWN';
	//     $report = new Reports;
	//     $report->ip_address = $ipaddress;
	//     $report->id_motelroom = $id;
	//     $report->status = $request->baocao;
	//     $report->save();
	//     $getmotel = Motelroom::find($id);
	// 	return redirect('phongtro/'.$getmotel->slug)->with('thongbao','Cảm ơn bạn đã báo cáo, đội ngũ chúng tôi sẽ xem xét');
	// }
}
