<?php

namespace App\Http\Controllers;

use App\Models\Foodbox;
use App\Models\Category;
use Illuminate\Http\Request;

class FoodBoxController extends Controller
{
    public function create()
    {
        return view('FoodBox.create');
    }

    public function categoryShow(Category $category)
    {
        $foodboxes = $category->foodboxes()->where('is_accepted',true)->paginate(9);
        return view('FoodBox.categoryShow', compact('category','foodboxes'));
    }

    public function show(Foodbox $foodbox)
    {
        // $foodbox = Foodbox::where('id', $id)->first();
        return view('FoodBox.show', compact('foodbox'));
    }
}
