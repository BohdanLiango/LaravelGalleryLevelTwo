<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    public $guarded = [];
    protected $table = 'post';

    public function tags()
    {
        return $this->belongsToMany('App\Tags', 'tags_posts', 'post_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User'); // Укразываем клас к которому будем обращатся
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
