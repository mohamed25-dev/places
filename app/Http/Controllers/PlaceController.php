<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Traits\RateableTrate;
use Illuminate\Http\Request;
class PlaceController extends Controller
{
    use RateableTrate;

    public function __construct()
    {
        $this->middleware('isOwner', ['only' => 'create', 'store']);
    }

    public function index()
    {
        $places = Place::orderBy('view_count', 'desc')->take(3)->get();
        return view('welcome', compact('places'));
    }

    public function create()
    {
        return view('add_place');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public\images', $imageName);

            auth()->user()->places()->create($request->except('image') + ['image' => $imageName]);
        } else {
            auth()->user()->places()->create($request->all());
        }

        return back()->with('success', 'أُضيف الموقع بنجاح');
    }

    public function show(Place $place)
    {
        $place = $place->withCount('reviews')
        ->with(['reviews' => function ($query) {
            $query->with('user')->withCount('likes');
        }])
        ->find($place->id);

        $avg = $this->averageRating($place);

        $total = $avg['total'];
        $service_rating = $avg['service_rating'];
        $quality_rating = $avg['quality_rating'];
        $cleanliness_rating = $avg['cleanliness_rating'];
        $pricing_rating = $avg['pricing_rating'];

        $reviews_count = $place->reviews()->count();

        return view('details', compact(
            'place', 
            'total',
            'service_rating', 
            'quality_rating', 
            'cleanliness_rating', 
            'pricing_rating',
            'reviews_count')
        );
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
