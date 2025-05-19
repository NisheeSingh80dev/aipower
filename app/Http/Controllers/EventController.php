<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    protected $event;

    public function __construct(Event $event)
    {
        $this->event = $event;
    }
    public function saveEvent(Request $request)
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
        $eventData = [
            'title' => $validated['title'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'user_id' => $user->id,
        ];

        // Create the post
        $event = Event::create($eventData);

        return response()->json([
            'status' => 'success',
            'message' => 'Event created successfully',
            'data' => $event,
        ], 200);
    }


    public function getAllEvent(Request $request)
    {
        // Fetch all posts ordered by latest
        $event = Event::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Events fetched successfully',
            'data' => $event,
        ], 200);
    }

    public function updateEvent(Request $request)
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
            'id' => 'required|integer|exists:event,id',
            'title' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'type' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:500',
        ]);

        // Find the post
        $event = Event::find($validated['id']);

        if (!$event) {
            return response()->json([
                'status' => false,
                'message' => 'Event not found',
            ], 404);
        }


        // Update post fields (only if present)
        $event->title = $validated['title'] ??  $event->title;
        $event->name = $validated['name'] ??  $event->name;
        $event->description = $validated['description'] ??  $event->description;
        $event->type = $validated['type'] ??  $event->type;
        $event->link = $validated['link'] ??  $event->link;

        $event->save();

        return response()->json([
            'status' => true,
            'message' => 'Event updated successfully',
            'data' =>  $event,
        ], 200);
    }
}