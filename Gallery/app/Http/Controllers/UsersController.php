<?php

namespace App\Http\Controllers;

use App\Image;
use App\Services\ImageService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct(ImageService $imageService)
    {
        $this->middleware('auth');
        $this->images = $imageService;
    }

    public function panel()
    {
        $userID = Auth::user()->id;

        $images = Image::all()->where('user_id', $userID);
        return view('config', ["imagesInView" => $images]);
    }

    public function index()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/home');
    }

}
