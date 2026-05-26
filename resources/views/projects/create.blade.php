@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3>Create Project</h3>
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

<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
    </div>

    <button class="btn btn-primary">Save</button>
    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection