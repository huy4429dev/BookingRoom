<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Motelroom extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = "motel_rooms";
    public function category()
    {
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District', 'district_id', 'id');
    }
    public function reports()
    {
        return $this->hasMany('App\Models\Reports', 'id_motelroom', 'id');
    }

    public function roomguest(){
        return $this->hasMany('App\Models\RoomGuest','room_motel_id','id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
