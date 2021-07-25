<?php

namespace App\Traits;

trait RateableTrate {
  
  public function averageRating ($place)
  {
    $avg = $place
              ->reviews()
              ->selectRaw(
                'avg(service_rating) service_rating,
                avg(quality_rating) quality_rating,
                avg(cleanliness_rating) cleanliness_rating,
                avg(pricing_rating) pricing_rating' )
              ->first();

    $total = array_sum($avg->toArray()) / 4;

    return [
      'total' => $total,
      'service_rating' => $avg->service_rating,
      'quality_rating' => $avg->quality_rating,
      'cleanliness_rating' => $avg->cleanliness_rating,
      'pricing_rating' => $avg->pricing_rating,
    ];
  } 
}