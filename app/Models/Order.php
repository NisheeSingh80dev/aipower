<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{

    use HasFactory;
    protected $table = 'orders';
    protected $fillable = ['product_id', 'name', 'phone', 'email', 'remark', 'user_id', 'address'];

    public function getAllOrder()
    {
        $res = DB::table('orders')
            ->select('*')
            ->where('status', '1')
            ->get();

        return $res;
    }
}