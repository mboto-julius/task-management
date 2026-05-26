@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-body">
        <h4>Task Details</h4>

        <p><strong>Name:</strong> {{ $task->name }}</p>
        <p><strong>Priority:</strong> {{ $task->priority }}</p>
        <p><strong>Project:</strong> {{ $task->project->name }}</p>
        <p><strong>Created:</strong> {{ $task->created_at }}</p>
    </div>
</div>
<a href="{{ route('tasks.index') }}" class="btn btn-secondary mt-3">Back</a>

@endsection