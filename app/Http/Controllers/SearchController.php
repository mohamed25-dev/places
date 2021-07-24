<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function autoComplete (Request $request)
    {
        if ($request->address)
        {
            $places = Place::where('address', 'LIKE', '%' . $request->address . '%')->get();
            $output =  '<ul  class="bg-gray-100 rounded px-6">';
            
            foreach($places as $place) {
                $output .=  '<li class="flex items-center justify-between my-4">'.$place->address.'<li>';
            }
            $output .= '<ul>';

            return $output;
        }
    }

    public function search (Request $request)
    {
        $places = Place::search($request)->get();
        return view('list', compact('places'));
    }
}
