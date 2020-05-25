<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class BlogPost extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    protected $table = "blog_posts";
    protected $fillable = ['title', 'description', 'thumbnail', 'content', 'user_id'];

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
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
