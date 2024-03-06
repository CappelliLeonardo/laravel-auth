<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Project;

// Helpers
use Illuminate\Support\Str;

//Form Request
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view("admin.projects.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.projects.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        
        $validationData=$request->validated();

        $slug = Str::slug($validationData['title']);
      

        // $project = Project::create($validationData);

        $project = Project::create([
            'title' => $validationData['title'],
            'slug' => $slug,
            'content'=> $validationData['content'],
        ]);

        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $slug)
    {
        $validationData=$request->validated();

        $project = Project::where('slug', $slug)->firstOrFail();
        $slug = Str::slug($validationData['title']);
        $validationData['slug'] = $slug;
        
        $project->updateOrFail($validationData);
        

        
        // $project->update($validationData);
        return redirect()->route('admin.projects.show', ['project' => $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $project = Project::where('slug', $slug)->firstOrFail();
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
