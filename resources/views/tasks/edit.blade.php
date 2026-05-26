@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3>Edit Task</h3>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $task->name) }}">
    </div>

    <div class="mb-3">
        <label>Project</label>
        <select name="project_id" class="form-control">
            <option value="">-- No Project --</option>

            @foreach($projects as $project)
                <option value="{{ $project->id }}"
                    {{ $task->project_id == $project->id ? 'selected' : '' }}>
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Priority</label>
        <input type="number" name="priority" class="form-control"
               value="{{ old('priority', $task->priority) }}">
    </div>

    <button class="btn btn-primary">Update Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection