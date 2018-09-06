<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    public $guarded = [];

    public function post()
    {
        return $this->belongsToMany('App\Post', 'tags_posts', 'tag_id', 'post_id')->using('App\TagsPost');
    }
}
