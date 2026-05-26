@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3>Create Task</h3>
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

<form action="{{ route('tasks.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <div class="mb-3">
        <label>Project</label>
        <select name="project_id" class="form-control">
            <option value="">-- No Project --</option>
            @foreach($projects as $project)
                <option value="{{ $project->id }}">
                    {{ $project->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Priority</label>
        <input type="number" name="priority" class="form-control" value="{{ old('priority') }}">
    </div>

    <button class="btn btn-primary">Save Task</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection