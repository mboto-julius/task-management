<?php

use App\Models\Task;
use App\Models\Project;

function totalProjects()
{
    return Project::count();
}

function totalTasks()
{
    return Task::count();
}