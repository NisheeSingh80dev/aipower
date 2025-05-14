<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // ✅ Table name (optional only if different from "products")
    protected $table = 'product';

    protected $fillable = [
        'name',
        'description',
        'short_des',
        'category_id',
        'user_id',
        'image',
        'status', // Make sure to add status if used
    ];

    // ✅ Define relationship to category
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // ✅ Accessor for full image URL
    public function getImageUrlAttribute()
    {
        return config('app.url') . '/uploads/products/' . $this->image;
    }

    // ✅ Get all products using Eloquent
    public static function getAllProduct()
    {
        return self::with('category')
            ->where('status', 1)
            ->orderBy('id', 'desc')
            ->get();
    }

    // ✅ Get products by category using Eloquent
    public static function getProductByCategoryId($categoryId)
    {
        return self::with('category')
            ->where('status', 1)
            ->where('category_id', $categoryId)
            ->get();
    }
}