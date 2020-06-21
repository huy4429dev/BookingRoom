<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomGuest extends Model
{
    protected $table = "room_guests";
    protected $fillable = ['fullname','email','phone','room_motel_id','watched'];
}
