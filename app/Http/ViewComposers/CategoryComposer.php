<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer {

  public function compose (View $view)
  {
    $categories = Category::all();
    return $view->with('categories', $categories);
  }
}