<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskManagementController extends Controller
{
    public function orderTask(Request $request)
    {
        DB::transaction(function () use ($request) {
            foreach ($request->order as $index => $id) {
                Task::where('id', $id)
                    ->where('project_id', $request->project_id)
                    ->update([
                        'priority' => $index + 1
                    ]);
            }
        });
        return response()->json(['status' => true]);
    }
}