<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function allProduct(Request $request)
    {

        $products = Product::all(); // or getAllProduct() if defined
        return response()->json([
            'status' => 'success',
            'message' => 'Products fetched successfully',
            'data' => $products,
        ], 200);
    }

    public function saveProduct(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_des' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/products'), $imageName);
            $imagePath = $imageName;
        }

        $productData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'short_des' => $validated['short_des'],
            'category_id' => $validated['category_id'],
            'image' => $imagePath,
        ];

        $product = Product::create($productData);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product,
        ], 200);
    }


    public function updateProduct(Request $request)
    {

        $validated = $request->validate([
            'product_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'short_des' => 'required|string|max:255',
            'category_id' => 'required|integer',
        ]);
        $product = Product::find($validated['product_id']);
        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }
        $imagePath = $product->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/products'), $imageName);
            $imagePath = $imageName;
        }
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->short_des = $validated['short_des'];
        $product->category_id = $validated['category_id'];
        $product->updated_at = now();
        $product->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product,
        ], 200);
    }

    public function getProductDetailsById(Request $request)
    {
        $productId = $request->input('id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Product fetched successfully',
            'data' => $product,
        ], 200);
    }

    public function getProductByCategoryId(Request $request)
    {
        // Validate request
        $request->validate([
            'id' => 'required',  // Check your actual table name: 'category' or 'categories'
        ]);


        $products = Product::where('id', $request->id)
            ->get();

        if ($products->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No products found in this category.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Products fetched successfully',
            'data' => $products,
        ]);
    }


    public function deleteProduct(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:product,id',
        ]);


        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product not found',
            ], 404);
        }


        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product marked as deleted successfully',
            'data' => $product,
        ], 200);
    }
}