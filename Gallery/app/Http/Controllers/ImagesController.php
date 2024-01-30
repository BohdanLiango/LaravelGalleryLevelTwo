<?php

namespace App\Http\Controllers;


use App\Services\CategoryService;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
    private $images;
    private $categories;

    public function __construct(ImageService $imageService, CategoryService $categoryService)
    {
        $this->categories = $categoryService;
        $this->images = $imageService;
    }

    public function index()
    {
        $categories = $this->categories->show();
        return view('images', ["imagesInView" => $this->images->all(), "categories" => $categories]);
    }


    public function create()
    {
        $categories = $this->categories->show();
        return view('create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $title = $request->input('title');
        $desc = $request->input('description');
        $image = $request->file('image');
        $cat = $request->input('category');
        $this->images->add($image, $title, $desc, $cat);
        return redirect("/gallery");

    }

    public function show($id)
    {
        $myImage = $this->images->one($id);
        return view('show', ['imageInView' => $myImage]);
    }


    public function edit($id)
    {
        $image = $this->images->one($id);
        return view('edit', ['imageInView' => $image]);
    }

    public function update($id, Request $request)
    {


        $this->validate($request, [
            'image' => 'image|required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $this->images->update($id, $request->image);
        return redirect("/gallery");
    }

    public function delete($id)
    {
        $this->images->delete($id);
        return redirect("profile/panel");
    }
}
