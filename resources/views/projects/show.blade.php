@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3>Project Details</h3>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <h5>Project Name: {{ $project->name }}</h5>
        <p>Created At: {{ $project->created_at }}</p>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <h5>Tasks (Drag to Reorder)</h5>

        @if($project->tasks->count() > 0)

            <ul id="task-list" class="list-group">

                @foreach($project->tasks as $task)
                    <li class="list-group-item task-item d-flex justify-content-between align-items-center"
                        data-id="{{ $task->id }}">

                        <span>{{ $task->name }}</span>

                        <span class="badge bg-primary">
                            #{{ $task->priority }}
                        </span>

                    </li>
                @endforeach

            </ul>

        @else
            <p class="text-muted">No tasks found for this project.</p>
        @endif

    </div>
</div>

<a href="{{ route('projects.index') }}" class="btn btn-secondary mt-3">Back</a>

@endsection

{{-- DRAG & DROP SCRIPT --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

<script>
$(function () {

    $("#task-list").sortable({
        update: function () {

            let order = [];

            $(".task-item").each(function () {
                order.push($(this).data("id"));
            });

            $.ajax({
                url: "{{ route('tasks.reorder') }}",
                method: "POST",
                data: {
                    order: order,
                    project_id: {{ $project->id }},
                    _token: "{{ csrf_token() }}"
                },
                success: function () {
                    location.reload();
                }
            });

        }
    });

});
</script>