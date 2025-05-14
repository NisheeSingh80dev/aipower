<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;


use Illuminate\Support\Str;

class VideoController extends Controller
{
    protected $video;

    public function __construct(Video $video)
    {
        $this->video = $video;
    }

    public function saveVideo(Request $request)
    {
        // Authenticated user fetch karo
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token or user not found',
            ], 401);
        }

        // Request validate karo
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link'  => 'required|string|max:255',
            'type'  => 'required|string|max:100',
            'video' => 'nullable|mimes:mp4,avi,mov,wmv|max:20000', // 20MB
        ]);

        $videoPath = null;

        // Video file upload karo agar ho
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = Str::random(20) . '.' . $video->getClientOriginalExtension();

            $uploadPath = public_path('uploads/videos');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $video->move($uploadPath, $videoName);
            $videoPath = $videoName;
        }

        // Data save karo
        $videoData = [
            'title'   => $validated['title'],
            'link'    => $validated['link'],
            'type'    => $validated['type'],
            'video'   => $videoPath,
            'user_id' => $user->id,
        ];

        $video = Video::create($videoData);

        return response()->json([
            'status' => true,
            'message' => 'Video created successfully',
            'data' => $video,
        ], 200);
    }


    public function updateVideo(Request $request)
    {
        // Authenticated user fetch karo
        $user = Auth::user();
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token or user not found',
            ], 401);
        }

        // Validation
        $validated = $request->validate([
            'id'    => 'required|exists:videos,id',
            'title' => 'required|string|max:255',
            'link'  => 'required|string|max:255',
            'type'  => 'required|string|max:100',
            'video' => 'nullable|mimes:mp4,avi,mov,wmv|max:20000', // 20MB
        ]);

        $videoModel = Video::find($validated['id']);

        if (!$videoModel) {
            return response()->json([
                'status' => false,
                'message' => 'Video not found',
            ], 404);
        }

        // Agar new video file aayi ho to upload aur purani delete karo
        if ($request->hasFile('video')) {
            // Delete old video file if exists
            $oldPath = public_path('uploads/videos/' . $videoModel->video);
            if (file_exists($oldPath) && is_file($oldPath)) {
                unlink($oldPath);
            }

            // Upload new video
            $uploadedVideo = $request->file('video');
            $videoName = Str::random(20) . '.' . $uploadedVideo->getClientOriginalExtension();

            $uploadPath = public_path('uploads/videos');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $uploadedVideo->move($uploadPath, $videoName);
            $videoModel->video = $videoName;
        }

        // Update other fields
        $videoModel->title = $validated['title'];
        $videoModel->link  = $validated['link'];
        $videoModel->type  = $validated['type'];
        // $videoModel->user_id = $user->id; // update user_id if needed

        $videoModel->save();

        return response()->json([
            'status' => true,
            'message' => 'Video updated successfully',
            'data' => $videoModel,
        ], 200);
    }


    public function getAllVideo(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token or user not found',
            ], 401);
        }

        // Agar sirf current user ke videos chahiye to:
        //$videos = Video::where('user_id', $user->id)->get();

        // Agar sabhi videos chahiye (user-wise filter nahi chahiye) to:
        $videos = Video::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Videos fetched successfully',
            'data' => $videos,
        ], 200);
    }


    public function deleteVideo(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid token or user not found',
            ], 401);
        }

        $videoId = $request->input('id');

        if (!$videoId) {
            return response()->json([
                'status' => false,
                'message' => 'Video ID is required',
            ], 422);
        }

        $video = Video::find($videoId);

        if (!$video) {
            return response()->json([
                'status' => false,
                'message' => 'Video not found',
            ], 404);
        }

        // Check if 'status' column exists
        if (!Schema::hasColumn('videos', 'status')) {
            return response()->json([
                'status' => false,
                'message' => "'status' column not found in videos table. Please add it via migration.",
            ], 500);
        }

        // Mark video as deleted
        $video->status = 0;
        $video->save();

        return response()->json([
            'status' => true,
            'message' => 'Video marked as deleted successfully',
            'data' => $video,
        ], 200);
    }
}