<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public $guarded = [];


    public function user()
    {
        return $this->belongsTo('App\User'); // Укразываем клас к которому будем обращатся
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
