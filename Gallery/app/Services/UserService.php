<?php

namespace App\Services;

use App\Image;
use Illuminate\Support\Facades\Auth;

class UserService
{


    public function showUserId()
    {
        $userID = Auth::user()->id;
        return $userID;
    }

    public function showUserImage()
    {
        $userID = $this->showUserId();
        $userImage = Image::all()->where('user_id', $userID);
        return $userImage;
    }
}
