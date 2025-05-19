<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Query extends Model
{

    use HasFactory;
    protected $table = 'contact';
    protected $fillable = ['name', 'email', 'phone', 'remark', 'subject'];

    public function getAllQuery()
    {
        $res = DB::table('contact')
            ->select('*')
            //  ->where('status', '1')
            ->get();

        return $res;
    }
}