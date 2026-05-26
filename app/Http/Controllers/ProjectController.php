<?php

namespace App\Http\Controllers;

use App\Http\Requests\Projects\StoreRequest;
use App\Http\Requests\Projects\UpdateRequest;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->save();
        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::with(['tasks' => function ($q) {
            $q->orderBy('priority');
        }])->find($id);
        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Project not found.');
        }
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Project not found.');
        }
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Project not found.');
        }
        $project->name = $request->name;
        $project->save();
        return redirect()
            ->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Project not found.');
        }
        if ($project->tasks()->exists()) {
            return redirect()
                ->route('projects.index')
                ->with('error', 'Cannot delete project. It has tasks assigned.');
        }
        $project->delete();
        return redirect()
            ->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
