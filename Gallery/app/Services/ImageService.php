<?php

namespace App\Services;

use App\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function all()
    {
//        $images = DB::table('images')->select('*')->get();
//        $myImages = $images->all();
        $images = Image::paginate(20);
        $myImages = $images;
        return $myImages;
    }

    public function add($image, $title, $desc, $cat)
    {

        $store = new Image;
        $store->title = $title;
        $store->description = $desc;
        $store->image = $image->store('uploads');
        $store->category_id = $cat;
        $store->user_id = Auth::user()->id;
        $store->date_upload = date("Y-m-d H:i:s");

        $store->save();


//        DB::table('images')->insert(
//            ['image' => $image->store('uploads')]
//        );
    }

    public function one($id)
    {
//        $image = DB::table('images')->select('*')->where('id', $id)->first();
        $image = Image::all()->where('id', $id)->first();


        return $image;
    }

    public function update($id, $newImage)
    {
//        $image = $this->one($id);

        $image = Image::find($id);
        Storage::delete($image->image);
        $filename = $newImage->store('uploads');

        $data = [
            "image" => $filename
        ];
        $image->fill($data);
        $image->save();

//        DB::table('images')
//            ->where('id', $id)
//            ->update(['image' => $filename]);
    }


    public function delete($id)
    {
        $image = Image::find($id);
        Storage::delete($image->image);
        $image->delete();

//        $image = $this->one($id);
//        Storage::delete($image->image);
//        DB::table('images')->where('id', $id)->delete();
    }
}
