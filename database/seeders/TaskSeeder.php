<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $projects = Project::all();

        foreach ($projects as $project) {

            $tasks = [
                'Requirement Analysis',
                'System Planning',
                'Database Design',
                'UI/UX Design',
                'Backend Development',
                'Frontend Development',
                'API Integration',
                'Testing',
                'Bug Fixing',
                'Deployment',
            ];

            foreach ($tasks as $index => $taskName) {
                Task::create([
                    'name' => $taskName,
                    'project_id' => $project->id,
                    'priority' => $index + 1,
                ]);
            }
        }
    }
}