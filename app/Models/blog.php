<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog'; 
    protected $fillable = ['title','short_dec','description','date','image','user_id']; 

    public function getAllBlog() {
        $res = DB::table('blog')
         ->where('status', '1')
          ->orderBy('id', 'desc')
          ->get();  
          foreach ($res as $item) {
            $item->image_url=config('app.url') . '/uploads/blog/' . $item->image;
        } 
        return $res;
  }
    public function getBlogDetailsById($id) {
        $res = DB::table('blog')
         ->where('status', '1')
          ->where('id', $id)
          ->get();  
          foreach ($res as $item) {
            $item->image_url=config('app.url') . '/uploads/blog/' . $item->image;
        } 
        return $res;
  }
}
