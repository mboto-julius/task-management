<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tasks\StoreRequest;
use App\Http\Requests\Tasks\UpdateRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $projects = Project::latest()->get();
        $tasks = Task::with('project')
            ->filterByProject($request->project_id)
            ->orderBy('priority', 'asc')
            ->get();
        return view('tasks.index', compact('tasks', 'projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('tasks.create', compact('projects'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $task = new Task();
        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->priority = $request->priority;
        $task->save();
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect()
                ->route('tasks.index')
                ->with('error', 'Task not found.');
        }
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect()
                ->route('tasks.index')
                ->with('error', 'Task not found.');
        }
        $projects = Project::all();
        return view('tasks.edit', compact('task', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect()
                ->route('tasks.index')
                ->with('error', 'Task not found.');
        }
        $task->name = $request->name;
        $task->project_id = $request->project_id;
        $task->priority = $request->priority;
        $task->save();
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return redirect()
                ->route('tasks.index')
                ->with('error', 'Task not found.');
        }
        $task->delete();
        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
