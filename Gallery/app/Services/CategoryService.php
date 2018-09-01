<?php

namespace App\Services;

use App\Category;

class CategoryService
{

    public function show()
    {
        $showCategory = Category::all();
        return $showCategory;
    }

}
