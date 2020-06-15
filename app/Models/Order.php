<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";
    protected $fillable = ['motel_id','user_id','total','created_at'];

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function motel(){
    	return $this->belongsTo('App\Models\Motelroom','motel_id','id');
    }
   
}
