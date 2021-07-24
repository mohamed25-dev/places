<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show (Category $category)
    {
        $places = $category->places;
        return view('list', compact('places'));
    }
}
