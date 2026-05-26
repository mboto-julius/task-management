@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Tasks</h3>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add Task</a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Project</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $task->name }}</td>
                <td>
                    {{ $task->project->name }}
                </td>
                <td>{{ $task->priority }}</td>

                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-sm btn-info">
                        Show
                    </a>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete task?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection