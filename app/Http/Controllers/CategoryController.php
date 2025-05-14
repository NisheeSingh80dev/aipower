<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function saveCategory(Request $request)
    {

        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'parent' => 'required|integer',
            'order' => 'required|integer',
            'show_in_nav' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/category'), $imageName);
            $imagePath = $imageName;
        }

        // Prepare data
        $categoryData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'parent' => $validated['parent'],
            'order' => $validated['order'],
            'show_in_nav' => $validated['show_in_nav'],
            // 'user_id' => $user->id,
            'image' => $imagePath,
        ];

        // Save to DB
        $category = Category::create($categoryData);

        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully',
            'data' => $category,
        ], 200);
    }

    public function updateCategory(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'parent' => 'required|integer',
            'order' => 'required|integer',
            'show_in_nav' => 'required|integer',
            //'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $categoryId = $request->input('category_id');
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found',
            ], 404);
        }
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/category'), $imageName);
            $imagePath = $imageName;
        }
        $category->name = $validated['name'];
        $category->description = $validated['description'];
        $category->parent = $validated['parent'];
        $category->order = $validated['order'];
        $category->show_in_nav = $validated['show_in_nav'];
        $category->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
            'data' => $category,
        ], 200);
    }

    public function getAllCategory(Request $request)
    {
        $category = $this->category->getAllCategory();
        return response()->json([
            'status' => 'success',
            'message' => 'Category fetched successfully',
            'data' => $category,
        ], 200);
    }

    public function getCategoryDetailsById(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer|exists:category,id',
        ]);

        $categoryId = $request->input('category_id');
        $category = Category::find($categoryId);

        return response()->json([
            'status' => 'success',
            'message' => 'Category fetched successfully',
            'data' => $category,
        ], 200);
    }

    public function deleteCategory(Request $request)
    {

        $categoryId = $request->input('category_id');
        $category = Category::find($categoryId);
        if (!$category) {
            return response()->json([
                'status' => false,
                'message' => 'Category not found',
            ], 404);
        }
        $category->status = '0';
        $category->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Category marked as deleted successfully',
            'data' => $category,
        ], 200);
    }
}