<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Query extends Model
{

    use HasFactory;
    protected $table = 'query';
    protected $fillable = ['name', 'email', 'phone', 'remark', 'user_id'];

    public function getAllQuery()
    {
        $res = DB::table('query')
            ->select('*')
            //  ->where('status', '1')
            ->get();

        return $res;
    }
}