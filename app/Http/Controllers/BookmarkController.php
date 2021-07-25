<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function bookmark ($id)
    {
        auth()->user()->bookmarks()->toggle($id);

        return back();
    }

    public function getUserBookmarks ()
    {
        $bookmarks = auth()->user()->bookmarks;
        return view('bookmarks', compact('bookmarks'));
    }
}
