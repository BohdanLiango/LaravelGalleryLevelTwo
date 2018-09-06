<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TagsPost extends Pivot
{
    protected $table = 'tags_posts';
    public $guarded = [];
}
