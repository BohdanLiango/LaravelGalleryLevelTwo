<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "category";
    public $guarded = [];


    public function image()
    {
        return $this->hasMany('App\Image');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

}
