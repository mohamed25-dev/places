<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store (Request $request)
    {
        auth()->user()->likes()->toggle($request->review_id);

        return Review::find($request->review_id)->likes()->count();
    }
}
