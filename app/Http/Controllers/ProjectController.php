<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProjectController extends Controller
{

    protected $project;

    public function __construct(Project $projects)
    {
        $this->project = $projects;
    }

    public function saveProject(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/projects'), $imageName);
            $imagePath = $imageName;
        }

        $projectData = [
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
            'type' => $validated['type'],
            'status' => $validated['status'],
            'image' => $imagePath,
        ];

        $project = Project::create($projectData);

        return response()->json([
            'status' => 'success',
            'message' => 'Project created successfully',
            'data' => $project,
        ], 200);
    }


    public function updateProject(Request $request)
    {

        $validated = $request->validate([
            'id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'status' => 'required|integer',
            'type' => 'required|string|max:255',
        ]);
        $project = Project::find($validated['id']);
        if (!$project) {
            return response()->json([
                'status' => false,
                'message' => 'Project not found',
            ], 404);
        }
        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageExtension = $image->getClientOriginalExtension();
            $imageName = Str::random(20) . '.' . $imageExtension;
            $image->move(public_path('uploads/projects'), $imageName);
            $imagePath = $imageName;
        }
        $project->title = $validated['title'];
        $project->subtitle = $validated['subtitle'];
        $project->status = $validated['status'];
        //     $project->type = $validated['type'];
        $project->updated_at = now();
        $project->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Project updated successfully',
            'data' =>  $project,
        ], 200);
    }

    public function getAllProject(Request $request)
    {

        $projects = Project::all(); // or getAllProduct() if defined
        return response()->json([
            'status' => 'success',
            'message' => 'Projects fetched successfully',
            'data' => $projects,
        ], 200);
    }

    public function deleteProject(Request $request)
    {
        $request->validate([
            'project_id' => 'required|integer|exists:projects,id',
        ]);


        $projectId = $request->input('project_id');
        $project = Project::find($projectId);

        if (!$project) {
            return response()->json([
                'status' => false,
                'message' => 'Project not found',
            ], 404);
        }


        $project->delete();

        return response()->json([
            'status' => true,
            'message' => 'Project marked as deleted successfully',
            'data' => $project,
        ], 200);
    }
}