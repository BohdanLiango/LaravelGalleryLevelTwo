<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    private $images;

    public function __construct(ImageService $imageService)
    {
        $this->images = $imageService;
    }


    public function home() {

        return view('home');
    }

    public function panel() {
        return view('config', ["imagesInView" => $this->images->all()]);
    }


    public function contact() {

        return view('contact');
    }
}
