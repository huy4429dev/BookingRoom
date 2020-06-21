<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{

    public function boot()
    {
        View::composer('*', function($view){

            
            $countAlert = 0;
            $messageAlert = [];
            $motelRooms = Auth::user()->rooms;
            foreach($motelRooms as $motelRoom){

                
                if($motelRoom->roomguest->count() > 0){

                    
                    foreach($motelRoom->roomguest as $customer){

                        if(!$customer->watched){
                            $messageAlert[] =
                             [
                               'alert' =>  strlen($customer->fullname . ' đã đặt phòng ' . $motelRoom->title) > 35 ? substr($customer->fullname . ' đã đặt phòng ' . $motelRoom->title,0, 35) . '...' : $customer->fullname . ' đã đặt phòng ' . $motelRoom->title,
                               'link'  => '/user/post/edit/'.$motelRoom->slug
                             ];
                            $countAlert += 1;
                        }

                    }

                }
            }
            $view->with(['countAlert' => $countAlert, 'messageAlert' => $messageAlert]);
        }); 
    }


    public function register()
    {
        //
    }
}
