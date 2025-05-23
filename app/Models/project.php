<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{

    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ['title', 'subtitle', 'type', 'image', 'status'];

    public function getAllRunningProject()
    {
        $res = DB::table('projects')

            ->select('*')
            //   ->where('type', '1')
            //   ->where('status', '1')
            ->get();

        foreach ($res as $item) {
            $item->image_url = config('app.url') . '/uploads/projects/' . $item->image;
        }

        return $res;
    }
    public function getAllCompletedProject()
    {
        $res = DB::table('projects')
            ->select('*')
            ->where('type', '2')
            //  ->where('status', '1')
            ->get();

        foreach ($res as $item) {
            $item->image_url = config('app.url') . '/uploads/projects/' . $item->image;
        }

        return $res;
    }
}