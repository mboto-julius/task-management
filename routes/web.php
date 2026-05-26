<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskManagementController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resources([
    'projects' => ProjectController::class,
    'tasks' => TaskController::class,
]);

Route::post('/tasks/reorder', [TaskManagementController::class, 'orderTask'])->name('tasks.reorder');


