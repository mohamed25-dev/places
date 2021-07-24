<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function getImageAttribute ($image)
    {
        return asset('storage/images/' . $image);
    }

    public function scopeSearch ($query, $request)
    {
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        if ($request->address) {
            $query->where('address', 'LIKE', '%' . $request->address . '%');
        }

        return $query;
    }
}
