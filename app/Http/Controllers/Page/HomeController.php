<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\District;
use App\Models\Motelroom;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $district = District::all();
        $categories = Categories::all();
        $hot_motelroom = Motelroom::where('approve', 1)->limit(6)->orderBy('count_view', 'desc')->get();
        $map_motelroom = Motelroom::where('approve', 1)->get();
        $listmotelroom = Motelroom::where('approve', 1)->paginate(4);
        
        return view('home', [
          'district' => $district,
          'categories' => $categories,
          'hot_motelroom' => $hot_motelroom,
          'map_motelroom' => $map_motelroom,
          'listmotelroom' => $listmotelroom
        ]);
    }
}
