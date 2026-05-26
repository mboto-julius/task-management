@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Projects</h3>
    <a href="{{ route('projects.create') }}" class="btn btn-primary">Add Project</a>
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
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $project->name }}</td>
                <td>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-sm btn-info">
                        Show
                    </a>
                    <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                        Edit
                    </a>
                    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete project?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection