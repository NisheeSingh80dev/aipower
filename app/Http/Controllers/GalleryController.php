<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    protected $gallery;

    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }
    public function saveGallery(Request $request)
    {

        // Validate the request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link'  => 'required|string|max:255',
            'type'  => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = $request->user(); // ✅ Add this line

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated user',
            ], 401);
        }


        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::random(20) . '.' . $image->getClientOriginalExtension();

            $uploadPath = public_path('uploads/gallery');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);
            $imagePath = $imageName;
        }

        // Create the gallery record
        $gallery = Gallery::create([
            'title' => $validated['title'],
            'link' => $validated['link'],
            'type' => $validated['type'],
            'image' => $imagePath,
            'user_id' => $user->id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery created successfully',
            'data' => $gallery,
        ], 200);
    }

    public function updateGallery(Request $request)
    {
        $validated = $request->validate([
            'id'    => 'required|exists:gallery,id',
            'title' => 'required|string|max:255',
            'link'  => 'required|string|max:255',
            'type'  => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $gallery = Gallery::find($validated['id']);

        if (!$gallery) {
            return response()->json([
                'status' => false,
                'message' => 'Gallery not found',
            ], 404);
        }

        // Image upload logic
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;

            $uploadPath = public_path('uploads/gallery');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $image->move($uploadPath, $imageName);
            $gallery->image = $imageName;
        }

        // Update other fields
        $gallery->title = $validated['title'];
        $gallery->link = $validated['link'];
        $gallery->type = $validated['type']; // ensure this is also updated
        $gallery->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery updated successfully',
            'data' => $gallery,
        ], 200);
    }



    public function getAllGallery(Request $request)
    {
        // Optional: filter or paginate if needed later
        $gallery = Gallery::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery fetched successfully',
            'data' => $gallery,
        ], 200);
    }


    public function deleteGallery(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:gallery,id',
        ]);

        $gallery = Gallery::find($validated['id']);

        if (!$gallery) {
            return response()->json([
                'status' => false,
                'message' => 'Gallery not found',
            ], 404);
        }

        // Mark as deleted (soft delete behavior)
        //   $gallery->status = '0';
        $gallery->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery marked as deleted successfully',
            'data' => $gallery,
        ], 200);
    }
}