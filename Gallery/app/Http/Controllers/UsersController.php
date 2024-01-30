<?php

namespace App\Http\Controllers;

use App\Image;
use App\Services\ImageService;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    private $images;
    private $users;

    public function __construct(ImageService $imageService, UserService $userService)
    {
        $this->middleware('auth');
        $this->images = $imageService;
        $this->users = $userService;
    }

    public function panel()
    {
        $userID = $this->users->showUserId();
        $images = Image::all()->where('user_id', $userID);
        return view('config', ["imagesInView" => $images]);
    }

    public function index()
    {
        $user = Auth::user();
        $userImages = $this->users->showUserImage();
        return view('profile', ['user' => $user, "imagesInView" => $userImages]);
    }

    public function logOut()
    {
        Auth::logout();
        return redirect('/');
    }

}
