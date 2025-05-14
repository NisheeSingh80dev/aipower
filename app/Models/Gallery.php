<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
  use HasFactory;
  protected $table = 'gallery';
  protected $fillable = ['title', 'link', 'type', 'image', 'user_id'];

  public function getAllGallery()
  {
    $res = DB::table('gallery')
      //   ->where('status', '1')
      ->where('type', '1')
      ->orderBy('id', 'desc')
      ->get();
    foreach ($res as $item) {
      $item->image_url = config('app.url') . '/uploads/gallery/' . $item->image;
    }
    return $res;
  }
}