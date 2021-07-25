<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

class Slug
{
  public static function uniqueSlug ($slug, $table)
  {
    $slug = self::createSlug($slug);
    $items = DB::table($table)->select('slug')->whereRaw("slug LIKE '{$slug}%' ")->get();

    $count = count($items) + 1;
    
    return $slug . '-' . $count;
  }

  protected static function createSlug ($str)
  {
    $slug = trim($str);
    $slug = mb_strtolower($slug, 'UTF-8');

    $slug = preg_replace("/[\s\-_]+/", ' ', $slug) ;
    $slug = preg_replace("/[\s\_]/", '-', $slug);

    return rawurldecode($slug);
  }
}