<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $images;

    public function __construct(ImageService $imageService)
    {
        $this->images = $imageService;
    }

    public function index() {
        return view('images', ["imagesInView" => $this->images->all()]);
    }


    public function create() {
        return view('create');
    }

    public function store(Request $request) {

        $image = $request->file('image');
        $this->images->add($image);
        return redirect("/gallery");

    }

    public function show($id){
        $myImage = $this->images->one($id);
        return view('show', ['imageInView' => $myImage->image]);
    }

    public function edit($id) {
        $image = $this->images->one($id);
        return view('edit', ['imageInView' => $image]);
    }

    public function update($id, Request $request) {
        $this->images->update($id, $request->image);
        return redirect("/gallery");
    }

    public function delete($id) {
        $this->images->delete($id);
        return redirect("/panel");
    }
}
