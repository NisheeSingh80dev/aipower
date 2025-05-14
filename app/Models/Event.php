<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;
    protected $table = 'event'; 
    protected $fillable = ['title','description','image','user_id','subtitle']; 

    public function getAllEvent() {
        $res = DB::table('event')
         ->where('status', '1')
          ->orderBy('id', 'desc')
          ->get();  
          foreach ($res as $item) {
            $item->image_url=config('app.url') . '/uploads/event/' . $item->image;
        } 
        return $res;
  }
}
