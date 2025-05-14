<?php

namespace App\Http\Controllers;

use App\Models\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class QueryController extends Controller
{
    protected $query;

    public function __construct(Query $query)
    {
        $this->query = $query;
    }

    public function saveQuery(Request $request)
    {

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'remark' => 'required|string|max:255',

        ]);

        $user = $request->user(); // ✅ Add this line

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated user',
            ], 401);
        }


        $userData = [
            'name' => $validate['name'],
            'phone' => $validate['phone'],
            'email' => $validate['email'],
            'remark' => $validate['remark'],
            'user_id' => $user->id,

        ];
        //  print_r($userData);
        //  die;
        $query = Query::create($userData);
        return response()->json([
            'status' => 'success',
            'message' => 'Query created successfully',
            'data' => $query,
        ], 200);
    }

    public function getAllQuery(Request $request)
    {
        $queries = $this->query->getAllQuery();

        return response()->json([
            'status' => 'success',
            'message' => 'Queries fetched successfully',
            'data' => $queries,
        ], 200);
    }
}