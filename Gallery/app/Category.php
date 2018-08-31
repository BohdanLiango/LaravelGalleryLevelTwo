<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ["title"];
    public $table = "category";


    public function image()
    {
        return $this->hasMany('App\Image');
    }

}
