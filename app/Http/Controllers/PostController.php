<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use App\Models\User;


class PostController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function savePost(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'name'  => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'type'  => 'required',
        ]);

        // Get authenticated user
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token or user not found',
            ], 401);
        }


        // Prepare data for insertion
        $postData = [
            'title' => $validated['title'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'user_id' => $user->id,
        ];

        // Create the post
        $post = Post::create($postData);

        return response()->json([
            'status' => 'success',
            'message' => 'Post created successfully',
            'data' => $post,
        ], 200);
    }


    public function getAllPost(Request $request)
    {
        // Fetch all posts ordered by latest
        $posts = Post::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Posts fetched successfully',
            'data' => $posts,
        ], 200);
    }

    public function updatePost(Request $request)
    {
        // Get logged-in user
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token or user not found',
            ], 401);
        }

        // Validate incoming request
        $validated = $request->validate([
            'id' => 'required|integer|exists:posts,id',
            'title' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:500',
        ]);

        // Find the post
        $post = Post::find($validated['id']);

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post not found',
            ], 404);
        }


        // Update post fields (only if present)
        $post->title = $validated['title'] ?? $post->title;
        $post->name = $validated['name'] ?? $post->name;
        $post->description = $validated['description'] ?? $post->description;
        $post->type = $validated['type'] ?? $post->type;
        $post->link = $validated['link'] ?? $post->link;

        $post->save();

        return response()->json([
            'status' => true,
            'message' => 'Post updated successfully',
            'data' => $post,
        ], 200);
    }
}