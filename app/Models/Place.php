<?php

namespace App\Models;

use App\Helpers\Slug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Place extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'view_count'];
    
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

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews ()
    {
        return $this->hasMany(Review::class);
    }

    public function setNameAttribute ($val)
    {
        $this->attributes['name'] = $val;
        $this->attributes['slug'] = Slug::uniqueSlug($val, 'places');
    }
}
