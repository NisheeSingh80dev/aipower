<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    protected $order;

    public function __construct(Order $order)
    {

        $this->order = $order;
    }
    public function getAllOrder(Request $request)
    {

        $order = Order::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Products fetched successfully',
            'data' => $order,
        ], 200);
    }

    public function saveOrder(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'remark' => 'required|string|max:255',
            'product_id' => 'required|integer',
        ]);

        $user = $request->user(); // ✅ Add this line

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated user',
            ], 401);
        }

        $userData = [
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'address' => $validated['address'],
            'remark' => $validated['remark'],
            'product_id' => $validated['product_id'],
            'user_id' => $user->id, // from token

        ];

        $order = Order::create($userData);


        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $order,
        ], 200);
    }
}