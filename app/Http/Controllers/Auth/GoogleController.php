<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\User;
  
class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        // try {
    
            $user = Socialite::driver('google')->stateless()->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/');
     
            }else{

                // $user = User::where('email',$user->email)->first();
                // if($user != null) {

                //     Auth::login($user);
                //     return redirect('/');

                // }
                $newUser = User::create([
                    'name'      => $user->name,
                    'email'     => $user->email,
                    'google_id' => $user->id,
                    'password'  => '',
                ]);
                
                $newUser->assignRole(['room master']);


                Auth::login($newUser);
     
                return redirect('/');
            }
    
        // } catch (Exception $e) {
        //     echo('bala');
        //     dd($e->getMessage());
        // }
    }
}