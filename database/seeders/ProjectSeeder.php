<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            ['name' => 'Website Development'],
            ['name' => 'Mobile App Development'],
            ['name' => 'E-commerce Platform'],
            ['name' => 'School Management System'],
            ['name' => 'Task Management System'],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}