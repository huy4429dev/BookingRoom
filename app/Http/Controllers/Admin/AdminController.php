<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motelroom;
use App\Models\Order;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $year = date('yy');
        $month = date('m');

        $newUser = User::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get()
            ->count();
        $newMotel = Motelroom::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get()
            ->count();

        $newMotelApprove = Motelroom::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->whereIn('id', Order::all())
            ->get()
            ->count() / ( Motelroom::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get()
            ->count() == 0 ? 1 : Motelroom::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->get()
            ->count()) ;


        $newMotelPending = Motelroom::whereYear('created_at', '=', $year)
            ->whereMonth('created_at', '=', $month)
            ->where('approve', 0)
            ->get()
            ->count();

        return view(
            'admin.dashboard',
            [
                'newUser'  => $newUser,
                'newMotel' => $newMotel,
                'newMotelApprove'  => $newMotelApprove,
                'newMotelPending'  => $newMotelPending,

            ]
        );
    }
}
