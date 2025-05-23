<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project; // Import the Project model

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $projects = Project::all();
        $projects = Project::paginate(2);

        // for now-empty page
        if ($projects->isEmpty() && $projects->currentPage() !== 1) {
            return redirect()->route('project.index');
        }

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'url_repo' => 'nullable|string|max:255',
            'url_live' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('projects', 'public');
        }

        // Create the project
        Project::create($validatedData);

        return redirect()->route('project.index')->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:150',
            'description' => 'nullable|string',
            'url_repo' => 'nullable|string|max:255',
            'url_live' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|in:draft,published',
        ]);

        $project = Project::findOrFail($id);

        $project->title = $validatedData['title'];
        $project->description = $validatedData['description'] ?? null;
        $project->url_repo = $validatedData['url_repo'] ?? null;
        $project->url_live = $validatedData['url_live'] ?? null;
        $project->status = $validatedData['status'];

        // Handle new image upload if provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image && \Storage::disk('public')->exists($project->image)) {
                \Storage::disk('public')->delete($project->image);
            }

            $project->image = $request->file('image')->store('projects', 'public');
        }

        $project->save();

        return redirect()->route('project.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        if ($project->image && \Storage::disk('public')->exists($project->image)) {
            \Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return redirect()->route('project.index')->with('success', 'Project deleted successfully!');
    }
}
