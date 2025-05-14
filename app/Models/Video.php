<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'link', 'type', 'video'];

    // ✅ Yeh method class ke andar hi hona chahiye
    public static function getAllVideo()
    {
        return self::all(); // OR add where('status', 1) if status column exists
    }
}