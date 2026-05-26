@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="mb-4">Dashboard</h3>
    </div>
</div>

<div class="row">

    <!-- PROJECTS -->
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Projects</h5>
                <p class="card-text">
                    {{ totalProjects() }} Total Projects
                </p>
                <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">
                    View Projects
                </a>
            </div>
        </div>
    </div>

    <!-- TASKS -->
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Tasks</h5>
                <p class="card-text">
                    {{ totalTasks() }} Total Tasks
                </p>
                <a href="{{ route('tasks.index') }}" class="btn btn-light btn-sm">
                    View Tasks
                </a>
            </div>
        </div>
    </div>

</div>

@endsection