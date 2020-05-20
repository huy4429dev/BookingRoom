<?php


namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use App\User;
use App\Http\Controllers\Controller;


class FacebookController extends Controller
{


    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function callback()
    {
        $getInfo = Socialite::driver('facebook')->stateless()->user();
        $user = $this->createUser($getInfo);
        auth()->login($user);
        return redirect()->to('/');
    }
    function createUser($getInfo)
    {
        $user = User::where('facebook_id', $getInfo->id)->first();
        if (!$user) {

            $user = User::where('email', $getInfo->email)->first(); 

            if($user != null){
                return $user;
            }

            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'facebook_id' => $getInfo->id,
                'password' => '',
            ]);
        }
        
        $user->assignRole(['room master']);

        return $user;
    }
}
