<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{

    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name', 'description', 'parent', 'show_in_nav', 'order', 'image'];

    public function getAllCategory()
    {
        $res = DB::table('category')
            ->leftJoin('category as parent', 'category.parent', '=', 'parent.id')
            ->select('category.*', 'category.name as parentName')
            ->where('category.status', '1')
            ->get();

        foreach ($res as $item) {
            $item->image_url = config('app.url') . '/uploads/category/' . $item->image;
        }

        return $res;
    }

    public function getNavCategory()
    {
        $res = DB::table('category')
            ->leftJoin('product', 'category.parent', '=', 'product.id')
            ->select('category.*', 'product.name as parentName')
            ->where('category.status', '1')
            ->where('category.show_in_nav', '1')

            ->get();
        return $res;
    }
    public  function getSubCategoryByCategoryId($id)
    {
        return DB::table('category')
            ->select('*')

            ->where('status', '1')
            ->where('parent', $id)
            ->get();
    }
}